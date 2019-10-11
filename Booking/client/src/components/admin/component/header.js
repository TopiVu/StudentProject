import React, { Component } from 'react';
import {withRouter} from 'react-router-dom'
import {connect} from 'react-redux'
import cookie from 'react-cookies'
import { MDBCollapse, MDBNavbar, MDBNavbarBrand, MDBNavbarNav, MDBNavbarToggler, MDBNavItem,MDBBtn,MDBIcon } from "mdbreact";   


class component extends Component {
    constructor(props) {
        super(props);
        this.state = {
            collapse: false,
        };
        this.onClick = this.onClick.bind(this);
    }
    
    onClick() {
      this.setState({
          collapse: !this.state.collapse,
        });
    }
    logout(){
        cookie.remove('admin_cookie')
        const {dispatch} = this.props
        dispatch({type:'SET_MESSAGE',item:null})
        dispatch({type:'SET_SUCCESS',item:null})
        this.props.history.push('/admin')
    }
    back_p(){
        var {dispatch} = this.props
        dispatch({type:'SET_ROUTE',item:null})
    }
  render() {
    return (
        <div className="Header">
           <MDBNavbar style={{backgroundColor: "black"}} dark expand="md" scrolling fixed="top">
              <MDBNavbarBrand onClick={()=>this.back_p()} href="#">
                  <MDBIcon fab icon="github" rotate="360" size="2x" /> Meow
              </MDBNavbarBrand>
              <MDBNavbarToggler onClick={ this.onClick } />
              <MDBCollapse isOpen = { this.state.collapse } navbar>
                <MDBNavbarNav right>
                  <MDBNavItem>
                  <MDBBtn onClick={()=>this.logout()} className="btn btn-outline-blue">Đăng Xuất</MDBBtn>
                  </MDBNavItem>
                </MDBNavbarNav>
              </MDBCollapse>
            </MDBNavbar>

        </div>
    )
  }
}
export default connect((state)=>{
    return {route: state.route}
})(withRouter(component))