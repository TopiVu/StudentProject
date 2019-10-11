var customerSchema = require('./../data/model/customer')
var steersmanSchema = require('./../data/model/steersman')
var adminSchema = require('./../data/model/admin')
var contractSchema = require('./../data/model/contract')
var message = require('./../data/message.json')

var get_customer= async(req,res)=>{
    await customerSchema.find({del:true},(err,data)=>{
        if(data==null)
            return res.json({status:false,value:message.admin.null})
        else{
            return res.json({status:true,value:data})
        }
    })
}
var get_steersman= async(req,res)=>{
    await steersmanSchema.find({del:true},(err,data)=>{
        if(data==null)
            return res.json({status:false,value:message.admin.null})
        else{
            return res.json({status:true,value:data})
        }
    })
}
var  block_customer = async (req,res)=>{
    var {id} = req.body
    await customerSchema.findOne({_id:id},(err,data)=>{
        data.disable= !(data.disable)
        data.save()
        return res.json({status:true})
    })
}
var block_steersman = async (req,res)=>{
    var {id} = req.body
    await steersmanSchema.findOne({_id:id},(err,data)=>{
        data.disable= !(data.disable)
        data.status= !(data.status)
        data.save()
        return res.json({status:true})
    })
}
var detail_ct = async (req,res)=>{
    var {id} = req.body
    await customerSchema.findOne({_id:id},(err,data)=>{
        return res.json({status:true,value:data})
    })
}
var detail_st = async (req,res)=>{
    var {id} = req.body
    await steersmanSchema.findOne({_id:id},(err,data)=>{
        return res.json({status:true,value:data})
    })
}
var update_customer = async (req,res)=>{
    var {id,phone,name,password} = req.body
    var check = null;
    await check_phone(phone,id,(value)=>{
        check = value
    })
    if (check==false)
        return res.json({status:false,value:message.admin.update_fail})
    else{
        await customerSchema.findOne({_id:id},(err,data)=>{
            data.phone = phone
            data.name = name 
            data.password = password
            data.save()
            return res.json({status:true,value:message.admin.update_success})
        })
    }
    
}
var update_steersman = async (req,res)=>{
    var {id,phone,name,password,age,number_plate,lat,lng} = req.body
    var check = null;
    await check_phone_st(phone,id,(value)=>{
        check = value
    })
    if (check==false)
        return res.json({status:false,value:message.admin.update_fail})
    else{
        await steersmanSchema.findOne({_id:id},(err,data)=>{
            data.phone = phone
            data.password = password
            data.name = name 
            data.age = age 
            data.number_plate = number_plate
            data.lat = lat
            data.lng = lng
            data.save()
            return res.json({status:true,value:message.admin.update_success})
        })
    }
    
}
var check_phone = async (phone,id,callback)=>{
    await customerSchema.find({phone:phone,_id:{$ne:id}},async(err,data)=>{
        if (data=='')
            return callback(true)
        else
            return callback(false)
    })
}
var check_phone_st = async (phone,id,callback)=>{
    await steersmanSchema.find({phone:phone,_id:{$ne:id}},async(err,data)=>{
        if (data=='')
            return callback(true)
        else
            return callback(false)
    })
}
module.exports ={
    get_customer,
    get_steersman,
    block_customer,
    block_steersman,
    detail_ct,
    detail_st,
    update_customer,
    update_steersman
}