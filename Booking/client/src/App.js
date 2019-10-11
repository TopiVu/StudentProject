import React, { Component } from 'react';
import {Route,withRouter} from 'react-router-dom'
import './App.css'
// Customer 
import ct_signin from './components/customer/signin'
import ct_signup from './components/customer/signup'
import customer from './components/customer/app'
import Maps from './components/map'
//Steersman
import st_sigin from './components/steersman/signin'
import st_index from './components/steersman/app'
//admin
import ad_sigin from './components/admin/signin'
import ad_index from './components/admin/app'
import authentication_error from './components/authentication_error'
 class src extends Component {
  render() {
    return(
      <div>
        <Route exact path='/authentication_error' component={authentication_error} />
        {/* customer */}
        <Route exact path ='/' component = {ct_signin} />
        <Route exact path='/signup' component={ct_signup}/>
        <Route exact path='/customer' component={customer}/>
        <Route exact path= '/map' component={Maps} />
        {/* steersman */}
        <Route exact path ='/index' component={st_sigin} />
        <Route exact path ='/steersman' component={st_index} />
        {/* ADMIN */}
        <Route exact path ='/admin' component={ad_sigin} />
        <Route exact path ='/manager' component={ad_index} />
      </div>
    )
  }
}
export default withRouter(src)