var mongoose = require('mongoose')

var Schema = mongoose.Schema

var  steersmanSchema = new Schema({
    name: String,
    cmnd: String,
    phone : {type:String, required:true},
    password: {type:String, required:true},
    date_active : Date,
    age: String,
    number_plate: String,
    img_info: String,
    img_car: String,
    lat: String,
    lng: String,
    point: Number,
    paypal:Number,
    status:Boolean,
    disable:Boolean,
    del:Boolean,
})

module.exports = mongoose.model('Steersmans',steersmanSchema)