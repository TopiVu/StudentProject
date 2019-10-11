import React, { Component } from 'react';
import { MDBContainer, MDBRow, MDBCol, MDBBtn, MDBIcon } from 'mdbreact';
import Customer from './customer'
import Business from './business'
import Steersman from './steersman'
import Home from './home'
import {connect} from 'react-redux'
// import axios from 'axios'
import {withRouter} from 'react-router-dom'
 class component extends Component {
    Home(){
        var {dispatch} = this.props
        dispatch({type:'SET_ROUTE',item:null}) 
    }
    Customer(){
        var {dispatch} = this.props
        dispatch({type:'SET_ROUTE',item:"customer"})
    }
    Business(){
        var {dispatch} = this.props
        dispatch({type:'SET_ROUTE',item:"business"})
    }
    Steersman(){
        var {dispatch} = this.props
        dispatch({type:'SET_ROUTE',item:"steersman"})
    }
  render() {
    return (
        <div>
          <MDBContainer className="text-center mt-5 pt-5">
            </MDBContainer>
        <MDBContainer> 
            <MDBRow>
                <MDBCol md="3" style={{minHeight:"550px"}} className = "border border-primary  border-right-2 border-bottom-0 border-left-0 border-top-0">
                    {
                        this.props.route!==null?
                        <MDBBtn onClick={()=>this.Home()} style={{width: "100%"}}className="btn btn-outline-blue" type="button">
                            Trang Chủ
                            <MDBIcon far icon="paper-plane" className="ml-2" />
                        </MDBBtn>:''
                    }
                    <MDBBtn onClick={()=>this.Customer()} style={{width: "100%"}}className="btn btn-outline-blue" type="button">
                        Quản lý Khách Hàng
                        <MDBIcon far icon="paper-plane" className="ml-2" />
                    </MDBBtn>
                    <MDBBtn onClick={()=>this.Steersman()} style={{width: "100%"}} className="btn btn-outline-blue" type="button">
                        Quản Lý Tài Xế
                        <MDBIcon far icon="paper-plane" className="ml-2" />
                    </MDBBtn>
                    <MDBBtn onClick={()=>this.Business()} style={{width: "100%"}} className="btn btn-outline-blue" type="button">
                        Quản lý Kinh Doanh
                        <MDBIcon far icon="paper-plane" className="ml-2" />
                    </MDBBtn>
                </MDBCol>
                <MDBCol>
                    {
                        this.props.route===null?
                        <Home/>:''
                    }
                    {
                        this.props.route==='customer'?
                        <Customer/>:''
                    }
                    {
                        this.props.route==='business'?
                        <Business/>:''
                    }
                     {
                        this.props.route==='steersman'?
                        <Steersman/>:''
                    }
                </MDBCol>           
            </MDBRow>
        </MDBContainer> 
        </div>
    )}
}
export default connect((state)=>{
    return {
        route: state.route
    }
}) (withRouter(component))
