var admin = require('../model/admin')
var mongoose = require('mongoose')
var DBurl = require('./../config')
mongoose.connect(DBurl.url)
var admins =[
    new admin({
        name: "admin",
        username :"admin" ,
        password: "123456",
        price_default:11000,
        price_km: 2000,
        del:true,
    })
   
];
var done = 0;
for(var i =0 ;i<admins.length;i++){
    admins[i].save(function(err,result){
        done ++;
        if(done === admins.length){
            mongoose.disconnect();
        }
    });
}
