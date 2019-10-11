import React from "react";
import { MDBContainer, MDBRow, MDBCol, MDBCard, MDBCardBody, MDBInput, MDBIcon,MDBBtn } from 'mdbreact';
import axios from 'axios'
import {connect} from 'react-redux'
import {Alert} from 'reactstrap'
class customer extends React.Component {
  signup(){
    const name = document.getElementById('name').value;
    const repass = document.getElementById('reps').value;
    const phone = document.getElementById('us').value;
    const pass = document.getElementById('ps').value;
    axios.post('http://localhost:8080/signup_ct',{
      name:name,
      phone: phone,
      pass: pass,
      repass:repass
    })
    .then(rs=>{
      var message = rs.data.value
      var status = rs.data.status
      var {dispatch} = this.props
      if (status === false)
      {
        dispatch({type:'SET_MESSAGE',item:message})
      }
      if (status === true)
      {
        dispatch({type:'SET_MESSAGE',item:null})
        dispatch({type:'SET_SUCCESS',item:message})
        this.props.history.push('/')

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
      <MDBRow>
        <MDBCol md="12">
          <MDBCard>
            <MDBCardBody className="mx-4">
              <div className="text-center">
                <h3 className="pink-text mb-5">
                  <strong>Đăng Ký</strong>
                </h3>
              </div>
              <MDBInput
                    label="Tên của bạn"
                    icon="user"
                    id ="name"
                    required
                    group
                    type="text"
                    validate
                    error="wrong"
                    success="right"
                  />
                  <MDBInput
                    label="Số điện thoại"
                    icon="phone"
                    id="us"
                    required
                    group
                    type="number"
                    validate
                    error="wrong"
                    success="right"
                  />
                  <MDBInput
                    label="Mật khẩu"
                    icon="lock"
                    id="ps"
                    required
                    group
                    type="password"
                    validate
                    error="wrong"
                    success="right"
                  />
                  <MDBInput
                    label="Nhập lại mật khẩu"
                    id="reps"
                    icon="exclamation-triangle"
                    group
                    required
                    type="password"
                    validate
                  />
              <MDBRow className="d-flex align-items-center mb-4">
                <MDBCol md="6" className="text-center">
                  <button
                    type="button"
                    className="btn btn-pink btn-block btn-rounded z-depth-1"
                    onClick={()=>this.signup()}
                  >
                    Đăng ký
                  </button>
                </MDBCol>
               
                <MDBCol md="6">
                  <p className="font-small grey-text d-flex justify-content-end">
                    Đã có tài khoản?
                    <a href="/" className="blue-text ml-1">

                      Đăng nhập
                    </a>
                  </p>
                </MDBCol>
              </MDBRow>
            </MDBCardBody>
            <div className="footer pt-3 mdb-color lighten-3">
              <MDBRow className="d-flex justify-content-center">
                <p className="font-small white-text mb-2 pt-3">
                  Hoặc đăng nhập với:
                </p>
              </MDBRow>
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
            </div>
          </MDBCard>
        </MDBCol>
      </MDBRow>
    </MDBContainer>
  );
}
}
export default connect((state)=>{
  return {message:state.message}
})(customer)