var customerSchema = require('./../data/model/customer')
var steersmanSchema = require('./../data/model/steersman')
var contractSchema = require('./../data/model/contract')
var adminSchema = require('./../data/model/admin')
var message = require('./../data/message.json')
var active = async (req,res)=>{
    var {id} = req.body
    await steersmanSchema.findOne({_id:id},(err,data)=>{
        if (err) return handleError(err)
        data.status = true
        data.save();
        return res.json(data)
    })
}
var disable = async (req,res)=>{
    var {id} = req.body
    await steersmanSchema.findOne({_id:id},(err,data)=>{
        if (err) return handleError(err)
        data.status = false
        data.save();
        return res.json(data)
    })
}
var get_pos = async (req,res)=>{
    await steersmanSchema.find({status:true,disable:false},(err,data)=>{
        if (err) return handleError(err)
        if(data =='')
            return res.json({status:false,value:message.map.null})
        else{
            var arr_pos =[]
            data.map((val)=>{
                arr_pos.push([val.lat,val.lng])
            })
            return res.json({status:true,value:arr_pos})
        }
    })
}
var math_pos = async (req,res)=>{
    var {start,km,end,id,route,paypal,price_default,price_km} = req.body;
    var price = (Math.ceil(km/1000))*price_km + price_default
    var check = null;
    await check_contract(id,(value)=>{
        check = value
    })
    if (start == null || end == null)
    {
        return res.json({status:false,value:message.map.null_pos})
    }
    if (check==false)
    {
        return res.json({status:false,value:message.map.booting})
    }
    if(paypal<price)
    {
       return res.json({status:false,value:message.map.poor})
    }
    else{
        await steersmanSchema.find({status:true,disable:false},async(err,data)=>{
            if(data ==null)
                return res.json({status:false,value:message.map.null})
            else{
                var st_id='';
                var min_km = 5.1;
                await data.map((val)=>{
                    var R= 6371
                    var dlat = (parseFloat(start.lat) - parseFloat(val.lat)) * (Math.PI /180)
                    var dlng = (parseFloat(start.lng) - parseFloat(val.lng)) * (Math.PI /180)
                    var lat1 = parseFloat(val.lat) * (Math.PI / 180);
                    var lat2 = parseFloat(start.lat) * (Math.PI / 180);
                    var a = Math.sin(dlat / 2) * Math.sin(dlat / 2) + Math.cos(lat1)
                    * Math.cos(lat2) * Math.sin(dlng / 2) * Math.sin(dlng / 2);
                    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                    var d = R*c; 
                    if (d<min_km)
                    {
                        st_id= val._id
                        min_km = d
                    }
                })
                if (min_km == 5.1)
                    return res.json({status:false,value:message.map.km})
                else  {
                    var change_km = km/1000
                    var  contract = new contractSchema({
                        date_create: new Date(),
                        customer:id, 
                        steersman:st_id,
                        postage: price,
                        start:start,
                        end:end,
                        route:route,
                        km: change_km,
                        status:'booting', // Booting, Accept, Complete
                        status_cancel:'',
                        complant:'',
                        del:true,
                    })
                    await contract.save().then()
                    await steersmanSchema.findOne({_id:st_id},async(err,data)=>{
                        data.status=false
                        await data.save().then()
                    })
                    await  contractSchema.findOne({customer:id,status:'booting'},async(err,data)=>{
                        if(data =='')
                            return console.log('err')
                        return res.json({status:true,value:data})
                    }).populate('customer steersman')

                }
            }
        })
    }
    
}
var load_booting_client = async (req,res)=>{
    var {id} = req.body
    contractSchema.findOne({status:'booting',customer:id},async (err,data)=>{
        if(data==null)
            return res.json({status:false,value:null})
        else {
            return res.json({status:true,value:data})
        }
    }).populate('customer steersman')
}
var check_contract = async (id,callback)=>{
    await contractSchema.find({customer:id,status:'booting'},async(err,data)=>{
        if (data=='')
        return callback(true)
        else return callback(false)
    })
} 
var cancel_contract_st = async(req,res)=>{
    var {id} = req.body
    await contractSchema.findOne({_id:id},(err,data)=>{
        data.status_cancel ="Tài xế hủy"
        data.save()
        return res.json(true)
    })
}
var cancel_contract_st_map = async(req,res)=>{
    var {id} = req.body
    await contractSchema.findOne({customer:id,status:'booting'},(err,data)=>{
        data.status_cancel ="Khách hủy"
        data.status ="cancel"
        data.save()
        return res.json(true)
    })
}
module.exports ={
    active,
    disable,
    get_pos,
    math_pos,
    load_booting_client,
    cancel_contract_st,
    cancel_contract_st_map
}