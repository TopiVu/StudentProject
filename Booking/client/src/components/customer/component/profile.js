import React, { Component } from 'react';
import {Container, Row, Col, Button, 
  Card, Alert, Table} 
from 'react-bootstrap';
import {connect} from 'react-redux'
import axios from 'axios'
import {withRouter} from 'react-router-dom'
import cookie from 'react-cookies'
import { MDBTableBody, MDBBtn, MDBIcon, MDBContainer, MDBRow,
  MDBModal, MDBModalBody, MDBModalHeader, MDBModalFooter,  MDBTable,
  MDBCarousel,MDBTableHead, MDBCarouselInner, 
  MDBCarouselItem, MDBView,MDBCol,MDBInput } 
  from "mdbreact"; 
class component extends Component {
  constructor(props){
    super(props);

    this.state = {
      show: false,
      show_update_pass:false,
      show_money:false,
      show_card:false,
      message:null,
      data_history:null,
      detail_st:null,
    };
    }
    async show_money(){
      await this.setState({ show_money: true});
    }
      async hide_money() {
        await this.setState({ show_money: false});
  
      }
      async show_update_pass(){
        await this.setState({ show_update_pass: true});
      }
        async hide_update_pass() {
          await this.setState({ show_update_pass: false});
    
        }
    async show() {
      await this.load_history()
      await this.setState({ show: true});
      
    }
    hide() {
      
      this.setState({ show: false});
    }
    async show_card(id) {
      await this.detail_steersman(id)
      await this.setState({ show_card: true});
     
    }
    hide_card() {
      this.setState({ show_card: false});
    }
    async detail_steersman(id){
      await axios.post('http://localhost:8080/load_detail_st',{id:id})
      .then(rs=>{
        var value = rs.data
        this.setState({detail_st:value})
      })
    }
    async load_history(){
      var id = cookie.load('customer_cookie')
      await axios.post('http://localhost:8080/load_history_ct',{id:id})
      .then(async rs=>{
        var status = rs.data.status
        var value = rs.data.value
        if ( status ===false)
        {
          await this.setState({message:value})
        }
        else{
          await this.setState({data_history:value})
        }
      })
    }
    async componentWillMount(){
        var id = cookie.load('customer_cookie')
        await axios.post('http://localhost:8080/load_profile_ct',{id:id})
        .then(async (rs)=>{
            var value = rs.data
            var {dispatch} = this.props
           await dispatch({type:'SET_DATA_PROFILE',item:value})
        })
    }
    tomap(){
        this.props.history.push('/map')
    }
  render() {
    return (
        <div>
          <MDBContainer className="text-center mt-5 pt-5">
          <br></br>
          <h1><b style={{fontSize: "1em", fontWeight: "600", color:"dodgerBlue"}}>Chào mừng đến với Meow</b></h1>
          <h5>Siêu web đặt xe tuyệt vời, siêu rẻ, siêu thú vị và cực nhiều ưu đãi hấp dẫn.</h5>   
          <br></br>
          <p>Cùng Meow tận hưởng chuyến đi của công nghệ hiện đại - an toàn, thân thiện.</p>
          <br></br> <br></br>
        </MDBContainer>
        <MDBContainer>
          <MDBModal isOpen={this.state.show_money} toggle={()=>this.show_money()}  
          size="sm"> 
            <MDBModalHeader toggle={()=>this.hide_money()} className="blue-gradient"
            style={{color: "white"}} >          
              <b>Nạp tiền</b>
            </MDBModalHeader>
            <MDBModalBody style={{fontFamily: "Verdana"}}>
              <MDBInput size="lg" icon="dollar-sign" label="Giá trị nạp" hint="" type="number"></MDBInput>
            </MDBModalBody>
            <MDBModalFooter className="blue-gradient">
              <MDBBtn outline color="light">Hoàn tất</MDBBtn>
            </MDBModalFooter>
          </MDBModal>  
        </MDBContainer>     
       <MDBContainer>     
          <MDBModal isOpen={this.state.show} toggle={()=>this.show()} size="lg"> 
          <MDBModalHeader toggle={()=>this.hide()}  style={{backgroundColor: "dodgerBlue", color: "white"}}>
          </MDBModalHeader>
          <MDBModalBody>
              <MDBTable>
                <MDBTableHead textInfo>
                  <tr >
                      <td colSpan="5" style={{ fontSize: "200%",
                      fontWeight: "600", textAlign: "center"}}>LỊCH SỬ CHUYẾN ĐI</td>
                  </tr>
                  <tr>
                    <th>Tuyến đường</th>
                    <th>Ngày đi</th>
                    <th>Tài xế</th>
                    <th>Giá</th>
                    <th>Chi tiết</th>
                  </tr>
                </MDBTableHead>
                <MDBTableBody>
                  {
                    this.state.data_history !==null?
                    (this.state.data_history).map(i=>{
                      return(
                        <tr>
                          <td>{i.route}</td>
                          <td>{i.date_create}</td>
                          <td>{i.steersman.name}</td>
                          <td>{i.postage} VNĐ</td>
                          <td>
                            <MDBBtn onClick={()=>this.show_card(i.steersman._id)} outline color="primary" >
                              <MDBIcon fas icon="file-alt" size="lg" className="blue-text"></MDBIcon>
                            </MDBBtn>
                          </td>
                      </tr>
                      )
                    }):<Alert className='text-center font-weight-bold' color="danger">
                        Bạn chưa có chuyến đi nào !!!
                      </Alert>
                    
                  }
                  
                </MDBTableBody>
              </MDBTable>
          </MDBModalBody>
          <MDBModalFooter style={{backgroundColor: "DodgerBlue", color: "white", height: "57px"}}>
          </MDBModalFooter>
        </MDBModal>  
        </MDBContainer> 
        <MDBContainer>     
          <MDBModal isOpen={this.state.show_card} toggle={()=>this.show_card()} size="lg"> 
            <MDBModalHeader toggle={()=>this.hide_card()} style={{backgroundColor: "orange", color: "white"}}>
              Thông tin tài xế
            </MDBModalHeader>
            {
              this.state.detail_st !==null?
              (<MDBModalBody>
                <MDBTable>
              <MDBRow>
                <MDBCol size="2">Mã tài xế : </MDBCol>
                <MDBCol size="5" className="text-left"><b>{this.state.detail_st._id}</b></MDBCol>
                <MDBCol size="2">Họ tên : </MDBCol>
                <MDBCol size="3" className="text-left"><b>{this.state.detail_st.name}</b></MDBCol>
              </MDBRow>
              <MDBRow>
                <MDBCol size="2">Số điện thoại : </MDBCol>
                <MDBCol size="5" className="text-left"><b>{this.state.detail_st.phone}</b></MDBCol>
                <MDBCol size="2">Biển số xe : </MDBCol>
                <MDBCol size="3" className="text-left"><b>{this.state.detail_st.number_plate}</b></MDBCol>
              </MDBRow>
              <MDBRow>
                <MDBCol size="2">Nhận xét : </MDBCol>
                <MDBCol size="10">
                  <MDBInput type="textarea" outline></MDBInput>
                </MDBCol>
              </MDBRow>
              <MDBRow>
                <MDBCol size="10"></MDBCol>
                <MDBCol size="2" className="text-left"><MDBBtn><b>Gửi</b></MDBBtn></MDBCol>       
              </MDBRow>
              </MDBTable>
            </MDBModalBody>):''
            }
            <MDBModalFooter style={{backgroundColor: "Orange", color: "white", height: "57px"}}>
            </MDBModalFooter>
            
          </MDBModal> 
        </MDBContainer>    
          <MDBRow>
            <Col md="6">
            <div className = "border border-primary border-bottom-0 border-left-0 border-top-1"
              style = {{alignItems: "center",paddingLeft: "5px", paddingTop: "10px"}}>         
              <Container>
                <Row>
                  <Col>
                    <h3><i class="fas fa-tags"></i> Thông tin cá nhân </h3>
                  </Col>
                  <Col xs={3} className="justify-content-md-right">
                    Thành viên mới <i class="fas fa-star"></i> 
                  </Col>
                </Row>
                <hr></hr>
                <br/>
                <Row className="justify-content-md-center">
                  <Col md = "auto">
                    <Card style={{width: "250px", height: "250px"}}>
                      <Card.Img variant = "top" src={require('./../../../img/xe.png')} roundedCircle></Card.Img>
                    </Card>
                  </Col>
                </Row>
                <Row className="justify-content-md-center">
                  <Col md = "auto">
                    <Button>Thay đổi ảnh đại diện</Button>
                  </Col>
                </Row>
                <br></br> 
                <Row>
                  <Col><Alert><b>Họ tên :</b> </Alert></Col>
                  <Col><Alert>{this.props.data_profile.name}</Alert></Col>
                </Row>
                <Row>
                  <Col><Alert><b>Số điện thoại :</b> </Alert></Col>
                  <Col><Alert>{this.props.data_profile.phone}</Alert></Col>
                </Row>
                <Row>
                  <Col><Alert><b>Điểm tích lũy :</b> </Alert></Col>
                  <Col><Alert>{this.props.data_profile.point} điểm</Alert></Col>
                </Row>
                <Row>
                  <Col><Alert><b>Số dư tài khoản :</b> </Alert></Col>
                  <Col><Alert>{this.props.data_profile.paypal} VNĐ <button type="button" class="btn btn-success"><MDBIcon onClick={()=>this.show_money()} icon="money-check-alt" size="2x"/></button></Alert></Col>
                </Row>
              </Container>    
            </div> 
          </Col>            
          <Col>
          <MDBBtn onClick={()=>this.tomap()} className="btn btn-outline-blue" type="button">
                        Đặt Xe
                <MDBIcon far icon="paper-plane" className="ml-2" />
          </MDBBtn>
          <MDBBtn onClick={()=>this.show_update_pass()} className="btn btn-outline-blue" type="button">
                       Cập nhật mật khẩu
                <MDBIcon far icon="paper-plane" className="ml-2" />
          </MDBBtn>
          <MDBBtn onClick={()=>this.show()} className="btn btn-outline-blue" type="button">
                        Lịch sử di chuyển
                <MDBIcon far icon="paper-plane" className="ml-2" />
          </MDBBtn>
            
            <br></br>
            <br></br>
            <MDBContainer>
              <MDBCarousel activeItem={1} length={3}
                            showControls={true}
                            showIndicators={true}
                            className="z-depth-1"                            
              >
                <MDBCarouselInner>
                  <MDBCarouselItem itemId="1">
                    <MDBView>
                      <img
                        className="d-block w-100"
                        src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                        alt="First slide"
                        height="320px"
                      />
                    </MDBView>
                  </MDBCarouselItem>
                  <MDBCarouselItem itemId="2">
                    <MDBView>
                      <img
                        className="d-block w-100"
                        src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                        alt="Second slide"
                        height="320px"
                      />
                    </MDBView>
                  </MDBCarouselItem>
                  <MDBCarouselItem itemId="3">
                    <MDBView>
                      <img
                        className="d-block w-100"
                        src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
                        alt="Third slide"
                        height="320px"
                      />
                    </MDBView>
                  </MDBCarouselItem>
                </MDBCarouselInner>
              </MDBCarousel>
            </MDBContainer>
            <hr></hr>
            <MDBContainer>
              <MDBCarousel activeItem={1} length={3}
                            showControls={true}
                            showIndicators={true}
                            className="z-depth-1"                            
              >
                <MDBCarouselInner>
                  <MDBCarouselItem itemId="1">
                    <MDBView>
                      <img
                        className="d-block w-100"
                        src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                        alt="First slide"
                        height="320px"
                      />
                    </MDBView>
                  </MDBCarouselItem>
                  <MDBCarouselItem itemId="2">
                    <MDBView>
                      <img
                        className="d-block w-100"
                        src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
                        alt="Second slide"
                        height="320px"
                      />
                    </MDBView>
                  </MDBCarouselItem>
                  <MDBCarouselItem itemId="3">
                    <MDBView>
                      <img
                        className="d-block w-100"
                        src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                        alt="Third slide"
                        height="320px"
                      />
                    </MDBView>
                  </MDBCarouselItem>
                </MDBCarouselInner>
              </MDBCarousel>
            </MDBContainer>
          </Col> 
        </MDBRow>
        <div style = {{paddingLeft: "20px",paddingRight: "20px", width: "100%"}}> 
          <Table  striped bordered hover>
            <thead style={{textAlign: "center"}}>
              <tr>
                <th ></th>
                <th style={{backgroundColor: "RoyalBlue", color: "White", fontSize:"120%"}}>
                  Giá cước lên xe </th>
                  <th style={{backgroundColor: "DodgerBlue", color: "White", fontSize:"120%"}}>
                  Giá cước mỗi km </th>
              </tr>
            </thead>
            <tbody >
            <tr style={{color:"dimgray"}}>
                <td><b style={{ fontSize:"120%"}}>Cách tính giá cước cũ</b></td>
                <td><b style={{ fontSize:"120%"}}>0đ</b></td>
                <td><b style={{ fontSize:"120%"}}>2.00đ/km</b></td>
              </tr>
              <tr style={{color:"dodgerblue"}}>
                <td><b style={{ fontSize:"120%"}}>Cách tính giá cước hiện tại</b></td>
                <td><b style={{ fontSize:"120%"}}>11.000đ</b></td>
                <td><b style={{ fontSize:"120%"}}>2.00đ/km</b></td>
              </tr>
            </tbody>
          </Table>
        </div>
        <MDBContainer>
          <MDBModal isOpen={this.state.show_update_pass} toggle={()=>this.show_update_pass()}  
          size="sm"> 
            <MDBModalHeader toggle={()=>this.hide_update_pass()} className="blue-gradient"
            style={{color: "white"}} >          
              <b>Thay đổi mật khẩu</b>
            </MDBModalHeader>
            <MDBModalBody style={{fontFamily: "Verdana"}}>
              <MDBInput size="lg" icon="lock" label="Mật khẩu cũ" type="password"></MDBInput>
              <MDBInput size="lg" icon="key" label="Mật khẩu mới" type="password"></MDBInput>
              <MDBInput size="lg" icon="unlock" label="Nhập lại mật khẩu" type="password"></MDBInput>
            </MDBModalBody>
            <MDBModalFooter className="blue-gradient">
              <MDBBtn outline color="light">Hoàn tất</MDBBtn>
            </MDBModalFooter>
          </MDBModal>  
        </MDBContainer>      
    </div>
    )
  }
}
export default connect((state)=>{
    return {route: state.route,data_profile:state.data_profile}
}) (withRouter(component))