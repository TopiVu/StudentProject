var customerSchema = require('./../data/model/customer')
var steersmanSchema = require('./../data/model/steersman')
var adminSchema = require('./../data/model/admin')
var message = require('./../data/message.json')
// xác thực
var auth_customer = async (req,res)=>{
    const {phone,pass} = req.body;
    if (phone == '' && pass =='' )
        return res.json({status:false,value:message.account.valnull})
    else if(phone =='')
        return res.json({status:false,value:message.account.phoenull})
    else if(pass =='')
        return res.json({status:false,value:message.account.passnull})
    else{
        await customerSchema.findOne({phone:phone,password:pass},(err,data)=>{
            if (err) return handleError(err);
            if(data ==null)
            {
                return res.json({status:false,value:message.account.err_pass})
            }
            else if(data.disable ==true)
            {
                return res.json({status:false,value:message.account.disable})
            }
            else{
                if (data.del == false)
                {
                    return res.json({status:false,value:message.account.disable})
                }
                else return res.json({status:true,value:data._id}) 
            }
        })
    }
}
var auth_steersman = async (req,res)=>{
    const {phone,pass} = req.body;
    if (phone == '' && pass =='' )
        return res.json({status:false,value:message.account.valnull})
    else if(phone =='')
        return res.json({status:false,value:message.account.phoenull})
    else if(pass =='')
        return res.json({status:false,value:message.account.passnull})
    else{
        await steersmanSchema.findOne({phone:phone,password:pass},(err,data)=>{
            if (err) return handleError(err);
            if(data ==null)
            {
            return res.json({status:false,value:message.account.err_pass})
            }
            else if(data.disable ==true)
            {
                return res.json({status:false,value:message.account.disable})
            }
            else{
                if (data.del == false)
                {
                    return res.json({status:false,value:message.account.disable})
                }
                else return res.json({status:true,value:data._id}) 
            }
        })
    }
}
var auth_admin = async (req,res)=>{
    const {phone,pass} = req.body;
    if (phone == '' && pass =='' )
        return res.json({status:false,value:message.account.valnull})
    else if(phone =='')
        return res.json({status:false,value:message.account.phoenull})
    else if(pass =='')
        return res.json({status:false,value:message.account.passnull})
    else{
        await adminSchema.findOne({username:phone,password:pass},(err,data)=>{
            if (err) return handleError(err);
            if(data ==null)
            {
            return res.json({status:false,value:message.account.err_pass})
            }
            else{
                if (data.del == false)
                {
                    return res.json({status:false,value:message.account.disable})
                }
                else return res.json({status:true,value:data._id}) 
            }
        })
    }
}
//Đăng ký
var check_phone = async (phone,callback)=>{
    await customerSchema.findOne({phone:phone},(err,data)=>{
        if (data==null)
            return callback(true)
        else return callback(false)
    })
}
var signup_ct = async (req,res)=>{
    const {name,phone,pass,repass} =req.body
    var check = null;
    await check_phone(phone,(value)=>{
        check = value
    })
    if (name == '' || phone == '' || pass =='' || repass =='')
        return res.json({status:false,value:message.account.allnull})
    else if (check==false)
        return res.json({status:false,value:message.account.phoneduplicate})
    else if(pass != repass)
        return res.json({status:false,value:message.account.repassfaile})
    else{
        var user = new customerSchema({
            name: name,
            phone : phone,
            password: pass,
            img: '',
            point: 0,
            paypal: 0,
            disable:false,
            del:true,
        })
        user.save()
        return res.json({status:true,value:message.account.success})
    }
}
module.exports={
    auth_customer,
    auth_steersman,
    auth_admin,
    signup_ct,
}