var customerSchema = require('./../data/model/customer')
var steersmanSchema = require('./../data/model/steersman')
var adminSchema = require('./../data/model/admin')
var contractSchema = require('./../data/model/contract')
var message = require('./../data/message.json')

var complete_contract = async(req,res)=>{
    var {id, st_id,ct_id,price} = req.body
    await contractSchema.findOne({_id:id},(err,data)=>{
        data.status = 'complete'
        data.save().then(console.log('Đã hoàn thành chuyến đi'))
    })
    await steersmanSchema.findOne({_id:st_id},(err,data)=>{
        data.paypal= data.paypal+price
        data.point = data.point + 1
        data.status = true
        data.save().then(console.log('Đã cập nhật steersman'))
    })
    await customerSchema.findOne({_id:ct_id},(err,data)=>{
        data.point = data.point + 1
        data.paypal = data.paypal-price 
        data.save().then(console.log('Đã cập nhật customer'))
    })
    return res.json(message.profile.complete)

}
module.exports ={
    complete_contract,
}