import { MDBContainer, MDBRow, MDBCol, MDBCard, MDBCardBody, MDBInput, MDBBtn, MDBIcon, MDBModalFooter } from 'mdbreact';
import React, { Component } from 'react';
import cookie from 'react-cookies'
import axios from 'axios'
import {connect} from 'react-redux'
import {Alert} from 'reactstrap'
class component extends Component {
  componentWillMount(){
    if(cookie.load('st_cookie')){
      this.props.history.push('/steersman') 
    }
  } 
  signin(){
    const phone = document.getElementById('us').value;
    const pass = document.getElementById('ps').value;
    axios.post('http://localhost:8080/authentic_st',{
      phone: phone,
      pass: pass
    })
    .then(result=>{
      var message = result.data.value
      var status = result.data.status;
      var {dispatch} = this.props
      if (status === false)
      {
        dispatch({type:'SET_MESSAGE',item:message})
      }
      if (status === true)
      {
        cookie.save('st_cookie', message)
        dispatch({type:'SET_MESSAGE',item:null})
        dispatch({type:'SET_SUCCESS',item:null})
        this.props.history.push('/steersman')
      }
    }) 
  }
  render() {
  return (
    <MDBContainer>
          { this.props.message !==null ?
              <Alert className='text-center font-weight-bold' color="danger">
                {this.props.message}
              </Alert>:''
          }
          { this.props.success !==null ?
            <Alert className='text-center font-weight-bold' color="success">
              {this.props.success}
            </Alert>:''
          }
      <MDBRow>
        <MDBCol md="12">
          <MDBCard>
            <MDBCardBody className="mx-4">
              <div className="text-center">
                <h3 className="dark-grey-text mb-5">
                  <strong>Đăng Nhập Tài Xế</strong>
                </h3>
              </div>
              <MDBInput
                id ="us"
                label="Số điện thoại"
                icon ="user"
                group
                type="number"
                validate
                error="wrong"
                success="right"
              />
              <MDBInput
                id="ps"
                label="Mật khẩu"
                group
                icon ="lock"
                type="password"
                validate
                containerClass="mb-0"
              />
              <p className="font-small blue-text d-flex justify-content-end pb-3">
                Quên
                <a href="#!" className="blue-text ml-1">
                  mật khẩu?
                </a>
              </p>
              <div className="text-center mb-3">
                <MDBBtn
                  type="button"
                  gradient="blue"
                  rounded
                  className="btn-block z-depth-1a"
                  onClick={()=>this.signin()}
                >
                 Đăng nhập
                </MDBBtn>
              </div>
              <p className="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2">

                Hoặc đăng nhập với:
              </p>
              <div className="row my-3 d-flex justify-content-center">
                <MDBBtn
                  type="button"
                  color="white"
                  rounded
                  className="mr-md-3 z-depth-1a"
                >
                  <MDBIcon fab icon="facebook-f" className="blue-text text-center" />
                </MDBBtn>
                <MDBBtn
                  type="button"
                  color="white"
                  rounded
                  className="mr-md-3 z-depth-1a"
                >
                  <MDBIcon fab icon="twitter" className="blue-text" />
                </MDBBtn>
                <MDBBtn
                  type="button"
                  color="white"
                  rounded
                  className="z-depth-1a"
                >
                  <MDBIcon fab icon="google-plus-g" className="blue-text" />
                </MDBBtn>
              </div>
            </MDBCardBody>
            <MDBModalFooter className="mx-5 pt-3 mb-1">
              
            </MDBModalFooter>
          </MDBCard>
        </MDBCol>
      </MDBRow>
    </MDBContainer>
  );
}}
export default connect((state)=>{
  return {message:state.message,success:state.success}
})(component)