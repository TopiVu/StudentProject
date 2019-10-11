import React, { Component } from 'react';
import cookie from 'react-cookies'
import Header from './component/header'
import Profile from './component/profile'
export default class admin extends Component {
    componentWillMount(){
        if(!cookie.load('admin_cookie')){
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
