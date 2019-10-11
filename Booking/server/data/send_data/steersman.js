var steersman = require('../model/steersman')
var mongoose = require('mongoose')
var DBurl = require('./../config')
mongoose.connect(DBurl.url)
var steersmans =[
    new steersman({
        name: 'Âu Dương Chấn Hoa',
        cmnd: '3124450575',
        phone : '0123456789',
        password:'123456',
        date_active : '2019/06/04',
        age: 28,
        number_plate: '63F8123',
        img_info: 'bien_xe01.png',
        img_car: 'xe01.png',
        lat: '10.764032',
        lng: '106.682285',
        point: 0,
        paypal: 0,
        status: true,
        disable:false,
        del:true,
    }),
    new steersman({
        name: 'Trần Hạo Vân',
        cmnd: '8218155315',
        phone : '0123456788',
        password:'123456',
        date_active : '2019/06/04',
        age: 32,
        number_plate: '63F8789',
        img_info: 'bien_xe02.png',
        img_car: 'xe02.png',
        lat: '10.763856',  
        lng: '106.691820',
        point: 0,
        paypal: 0,
        status: true,
        disable:false,
        del:true,
    }),
    new steersman({
        name: 'Lý Liên Kiệt',
        cmnd: '1124499505',
        phone : '0123456787',
        password:'123456',
        date_active : '2019/06/04',
        age: 40,
        number_plate: '63F8963',
        img_info: 'bien_xe03.png',
        img_car: 'xe03.png',
        lat: '10.763913', 
        lng: '106.680294',
        point: 0,
        paypal: 0,
        status: true,
        disable:false,
        del:true,
    }),
    new steersman({
        name: 'Trương Tam Phong',
        cmnd: '1124719505',
        phone : '0123456786',
        password:'123456',
        date_active : '2019/06/04',
        age: 69,
        number_plate: '63S7815',
        img_info: 'bien_xe03.png',
        img_car: 'xe03.png',
        lat: '10.7671623', 
        lng: '106.683347',
        point: 0,
        paypal: 0,
        status: true,
        disable:false,
        del:true,
    })
   
];
var done = 0;
for(var i =0 ;i<steersmans.length;i++){
    steersmans[i].save(function(err,result){
        done ++;
        if(done === steersmans.length){
            mongoose.disconnect();
        }
    });
}
