import React, { Component } from 'react';
import {withRouter} from 'react-router-dom'
import { MDBCollapse, MDBNavbar, MDBNavbarBrand, MDBNavbarNav, MDBNavbarToggler, MDBNavItem,MDBBtn,MDBIcon } from "mdbreact";   
import {connect} from 'react-redux'
import cookie from 'react-cookies'
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
        cookie.remove('st_cookie')
        const {dispatch} = this.props
        dispatch({type:'SET_ROUTE',item:'profile'})
        dispatch({type:'SET_MESSAGE',item:null})
        dispatch({type:'SET_SUCCESS',item:null})
        this.props.history.push('/index')
      
    } 
    back_p(){
        this.props.history.push('/steersman')
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