var mongoose = require('mongoose')

var Schema = mongoose.Schema

var  adminSchema = new Schema({
    name: String,
    username : {type:String, required:true},
    password: {type:String, required:true},
    price_default:Number,
    price_km: Number,
    del:Boolean,
})

module.exports = mongoose.model('Admins',adminSchema)