import React from 'react';
import Header from './component/header'
import Profile from './component/profile'
import {connect} from 'react-redux'
import cookie from 'react-cookies'
class customer extends React.Component {
  componentWillMount(){
    if(!cookie.load('customer_cookie')){
        this.props.history.push('/authentication_error')
    }
}
  render() {
    return (
        <div>
            <Header />
             <Profile />
        </div>
    );
  }
}
export default connect((state)=>{
    return {route: state.route}
})(customer)