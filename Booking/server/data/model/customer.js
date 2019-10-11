var mongoose = require('mongoose')

var Schema = mongoose.Schema

var  customerSchema = new Schema({
    name: String,
    phone : {type:String, required:true},
    password: {type:String, required:true},
    img: String,
    point: Number,
    paypal: Number,
    disable:Boolean,
    del:Boolean,
})

module.exports = mongoose.model('Customers',customerSchema)