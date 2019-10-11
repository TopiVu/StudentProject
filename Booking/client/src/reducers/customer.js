var redux = require('redux')

var reducer = (state = {
    //admin
    route:null,
    data_customer:null,
    data_steersman:null,
    //all
    message:null,
    success:null,
    // Dữ liệu profile
    data_profile:[],
    active:null,
    data_chuyen:null,
    //map
    data_pos:null,
    data_contract_boot:null,
    price:null,
    // Giá trị truyền đặt xe
    value_km:null, 
    value_start:null,
    value_end:null,
    value_route:null,
},action) =>{
    switch(action.type){
        case 'SET_ROUTE':
            return {...state, route: action.item};
        case 'SET_VALUE_ROUTE':
            return {...state, value_route: action.item};  
        case 'SET_PRICE':
            return {...state, price: action.item};
        case 'SET_ACTIVE':
            return {...state, active: action.item};
        case 'SET_KM':
            return {...state, value_km: action.item};
        case 'SET_START':
            return {...state, value_start: action.item};
        case 'SET_END':
            return {...state, value_end: action.item};
        case 'SET_MESSAGE':
            return {...state, message: action.item};
        case 'SET_SUCCESS':
            return {...state, success: action.item};
        case 'SET_DATA_PROFILE':
            return {...state, data_profile: action.item};
        case 'SET_DATA_POS':
            return {...state, data_pos: action.item};
        case 'SET_DATA_CHUYEN':
            return {...state, data_chuyen: action.item};
        case 'SET_CONTRACT_BOOT':
            return {...state, data_contract_boot: action.item};
        case 'SET_DATA_CUSTOMER':
            return {...state, data_customer: action.item};
        case 'SET_DATA_STEERSMAN':
            return {...state, data_steersman: action.item};
        default:
            return state;
    }
}

function Store(){
    var store = redux.createStore(reducer)
    return store
}


export default Store