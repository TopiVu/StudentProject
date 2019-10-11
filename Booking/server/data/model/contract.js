// data_create,customer,steersman,postage,start,end,status, complant
var mongoose = require('mongoose')

var Schema = mongoose.Schema

var  contractSchema = new Schema({
    date_create: Date,
    customer:{ type: Schema.Types.ObjectId, ref: 'Customers' }, 
    steersman:{ type: Schema.Types.ObjectId, ref: 'Steersmans' },
    postage: Number,
    start:Object,
    end:Object,
    route:String,
    km:String,
    status:String, // Booting, Accept, Complete
    status_cancel:String, 
    complant:String,
    del:Boolean,
})

module.exports = mongoose.model('Contracts',contractSchema)