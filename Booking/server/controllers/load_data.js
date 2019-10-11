var customerSchema = require('./../data/model/customer')
var steersmanSchema = require('./../data/model/steersman')
var adminSchema = require('./../data/model/admin')
var contractSchema = require('./../data/model/contract')
var message = require('./../data/message.json')

var profile_ct = async(req,res)=>{
    var {id} = req.body
    await customerSchema.findOne({_id:id},(err,data)=>{
        res.json(data)
    })
}
var profile_st = async(req,res)=>{
    var {id} = req.body
    await steersmanSchema.findOne({_id:id},(err,data)=>{
        res.json(data)
    })
}
var profile_ad = async(req,res)=>{
    var {id} = req.body
    adminSchema.findOne({_id:id},(err,data)=>{
        res.json(data)
    })
}
var load_booting = async (req,res)=>{
    var {id} = req.body
    contractSchema.findOne({status:'booting',steersman:id,status_cancel:''},async (err,data)=>{
        if(data==null)
            return res.json({status:true,value:null})
        else {
            return res.json({status:true,value:data})
        }
    }).populate('customer steersman')
}
var load_history_ct = async (req,res)=>{
    var {id} = req.body
    await contractSchema.find({customer:id,status:'complete'},(err,data)=>{
        if(data=='')
            return res.json({status:false,value:message.profile.null_history})
        else{
            return res.json({status:true,value:data})
        }
    }).populate('customer steersman')
}
var load_history_st = async (req,res)=>{
    var {id} = req.body
    await contractSchema.find({steersman:id,status:'complete'},(err,data)=>{
        if(data=='')
            return res.json({status:false,value:message.profile.null_history})
        else{
            return res.json({status:true,value:data})
        }
    }).populate('customer steersman')
}

var load_detail_st = async (req,res)=>{
    var {id} = req.body
    await steersmanSchema.findOne({_id:id},(err,data)=>{
        return res.json(data)
    })
}
module.exports ={
    profile_ct,
    profile_st,
    profile_ad,
    load_booting,
    load_history_ct,
    load_detail_st,
    load_history_st,
}