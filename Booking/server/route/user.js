var express = require('express')
var app = express.Router()
var authenticaton = require('./../controllers/authentication')
var load_data = require('./../controllers/load_data')
var map = require('./../controllers/map')
var handle = require('./../controllers/handle_data')
var admin =require('./../controllers/admin')
//Customer
app.post('/authentic_ct',authenticaton.auth_customer)
app.post('/load_profile_ct',load_data.profile_ct)
app.post('/signup_ct',authenticaton.signup_ct)
app.post('/load_history_ct',load_data.load_history_ct)
app.post('/load_detail_st',load_data.load_detail_st)
//Steersman
app.post('/authentic_st',authenticaton.auth_steersman)
app.post('/load_profile_st',load_data.profile_st)
app.post('/steersman_active',map.active)
app.post('/steersman_disable',map.disable)
app.post('/load_booting',load_data.load_booting)
app.post('/complete',handle.complete_contract)
app.post('/load_history_st',load_data.load_history_st)


//admin
app.post('/authentic_ad',authenticaton.auth_admin)
/////////customer
app.post('/get_customer',admin.get_customer)
app.post('/block_ct',admin.block_customer)
app.post('/detail_ct',admin.detail_ct)
// app.post('/delete_ct',admin.get_steersman)
app.post('/update_ct',admin.update_customer)
////////steersman
app.post('/get_steersman',admin.get_steersman)
app.post('/block_st',admin.block_steersman)
app.post('/detail_st',admin.detail_st)
app.post('/update_st',admin.update_steersman)


//map
app.post('/math_pos',map.math_pos) // tinh toan chon ra tai xe
app.get('/get_pos',map.get_pos)
app.post('/load_booting_client',map.load_booting_client)
app.post('/cancel_contract',map.cancel_contract_st)
app.post('/cancel_contract_map',map.cancel_contract_st_map)
module.exports = app