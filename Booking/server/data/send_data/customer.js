var customer = require('../model/customer')
var mongoose = require('mongoose')
var DBurl = require('./../config')
mongoose.connect(DBurl.url)
var customers =[
    new customer({
        name: 'Lê Tuấn Vũ',
        phone : '0383398080',
        password: '123456',
        img: '',
        point: 0,
        paypal: 100000,
        disable:false,
        del:true,
    }),
    new customer({
        name: 'Nguyễn Thy Mai Thư',
        phone : '0906796057',
        password: '123456',
        img: '',
        point: 0,
        paypal: 1000000,
        disable:false,
        del:true,
    })
   
];
var done = 0;
for(var i =0 ;i<customers.length;i++){
    customers[i].save(function(err,result){
        done ++;
        if(done === customers.length){
            mongoose.disconnect();
        }
    });
}
