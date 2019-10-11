import React, { Component } from 'react';
import { MDBInput, MDBBtn, MDBContainer, 
    MDBModal, MDBModalBody, MDBModalHeader, MDBModalFooter,
    MDBCard, MDBCardBody, MDBCardImage, MDBCardTitle,MDBIcon,MDBCol,MDBRow } 
    from "mdbreact";

import axios from 'axios'
import {Alert} from 'reactstrap'
import {connect} from 'react-redux'
class component extends Component {
    constructor(props){
        super(props);
    
        this.state = {
          show: false,
          show_detail:false,
          data_detail:null,
          message:null,
          success:null,
        };
          
    }
    componentWillMount(){
        this.load_customer()
      }
    async show(id) {
        await this.load_detail(id)
        await this.setState({ show: true});
        this.setState({success:null})
    }
    hide() {
        this.setState({ show: false});
        this.setState({message:null})
    }
    async show_detail(id) {
        await this.load_detail(id)
        await this.setState({ show_detail: true});
    }
    hide_detail() {
        this.setState({ show_detail: false});
       
    }
    
   
    
    async load_customer(){
       await axios.post('http://localhost:8080/get_customer')
        .then(rs=>{
            var {dispatch} = this.props
            var status = rs.data.status
            var value = rs.data.value
            if(status ===true){
                dispatch({type:"SET_DATA_CUSTOMER",item:value})
            }
        }) 
    }
    Block(id){
        axios.post('http://localhost:8080/block_ct',{id:id})
        .then(rs=>{
            var status= rs.data.status
            if(status === true)
                this.load_customer()
        })
    }
    async load_detail(id){
        await axios.post('http://localhost:8080/detail_ct',{id:id})
        .then(async rs=>{
            var status= rs.data.status
            var value = rs.data.value
            if(status === true)
               await this.setState({data_detail:value})
        })
    }
    async Save(id){
        var name = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;
        var ps = document.getElementById('ps').value;
        if (name==='')
            name = document.getElementById('name').placeholder
        if (phone==='')
            phone = document.getElementById('phone').placeholder
        if (ps==='')
            ps = document.getElementById('ps').placeholder
        await axios.post('http://localhost:8080/update_ct',{
            id:id,
            name:name,
            phone:phone,
            password:ps,
        })
        .then(rs=>{
            var status = rs.data.status
            var value = rs.data.value
            if(status ===false)
            {   
               this.setState({message:value})
            }
            else{
                this.load_customer()
                this.hide()
                this.setState({success:value})
            }
        })
    }   
  render() {
    return (
        <div>
       <MDBContainer>
          <MDBModal isOpen={this.state.show} toggle={()=>this.show()}> 
          <MDBModalHeader  toggle={()=>this.hide()} closeButton style={{backgroundColor: "DodgerBlue", color: "white"}}>
            Cập nhật thông tin khách hàng
            {
                this.state.message !==null?
                <Alert className='text-center font-weight-bold' color="danger">
                    {this.state.message}
                </Alert>:''
            }
          </MDBModalHeader>
            {
                this.state.data_detail !== null?
                <MDBModalBody>
              <div className="form-group"> 
                <MDBInput id="name" label="Tên khách hàng"  hint={this.state.data_detail.name} icon="user"/>
                <MDBInput id="phone" label="Số điện thoại" hint={this.state.data_detail.phone} icon="phone" type="number"/>
                <MDBInput id="ps" label="Mật khẩu" hint={this.state.data_detail.password} icon="lock" type="text"/>

                <MDBCard  style={{ width: "100%"}}>
                  <div className="align-self-center">
                    <MDBCardImage className="img-fluid" src={require('./xe.png')} waves />
                    <MDBCardBody>
                      <MDBCardTitle>Ảnh đại diện</MDBCardTitle>
                      <MDBBtn color="primary">Chọn ảnh khác</MDBBtn>
                    </MDBCardBody>
                  </div>
                </MDBCard>
              </div>                   
             </MDBModalBody>:''
            }
          {
                this.state.data_detail !== null?
            <MDBModalFooter style={{backgroundColor: "DodgerBlue", color: "white"}}>
                <MDBBtn onClick={()=>this.Save(this.state.data_detail._id)} size="lg" color="outline-light">
                <b>Hoàn tất</b>
                </MDBBtn>
            </MDBModalFooter>:''}
        </MDBModal>  
        </MDBContainer>
        <MDBContainer>
          <MDBModal isOpen={this.state.show_detail} toggle={()=>this.show_detail()}  size="lg"> 
            <MDBModalHeader toggle={()=>this.hide_detail()} className="blue-gradient"
            style={{color: "white", fontSize: "120%"}}>
              
              <b><MDBIcon  icon="id-card" className="mr-3"></MDBIcon>Thông tin chi tiết</b>
            </MDBModalHeader>
            {
                this.state.data_detail !== null?
            <MDBModalBody style={{fontFamily: "Verdana"}} >
              <MDBRow >
                <MDBCol size="3"  className="text-center">
                  <MDBCard  style={{ width: "100%"}}>
                      <MDBCardImage className="img-fluid" src={require('./xe.png')} waves />
                  </MDBCard>
                </MDBCol>

                {/* CỘT 2 */}
                <MDBCol size="5">
                  <MDBRow>
                    <MDBCol size="2">
                      <MDBIcon icon="user" size="2x" className="m-0"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="10">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Họ tên</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.name}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow> 
                  <MDBRow>
                    <MDBCol size="2">
                      <MDBIcon icon="phone" size="2x" className="m-0"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="10">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Số điện thoại</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.phone}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow> 
                  <MDBRow>
                    <MDBCol size="2">
                      <MDBIcon icon="lock" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="10">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Mật khẩu</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.password}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>       
                </MDBCol>
                
                {/* CỘT 3 */}
                <MDBCol size="4">
                <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="star" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Điểm</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.point}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="credit-card" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Số dư tài khoản</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.paypal} VNĐ</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="laugh" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Trạng thái</p>
                      {this.state.data_detail.disable ===false?
                        <p  style={{margin: "0"}}>Đang hoạt động</p>:<p  style={{margin: "0"}}>Đã bị khóa</p>
                        }
                      
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                </MDBCol>
              </MDBRow>  
            </MDBModalBody>:''
            }
            {
            this.state.data_detail !== null?
            <MDBModalFooter className="blue-gradient d-inline-block" style={{height: "57px"}}>
              <div className="float-none text-center" style={{color: "white", fontSize: "120%"}}>
                <b>#ID: </b> <b>{this.state.data_detail._id}</b>
              </div>
            </MDBModalFooter>:''
            }
          </MDBModal>  
        </MDBContainer>            
            <h1>Quản Lý Khách Hàng</h1>
            {
                this.state.success !==null?
                <Alert className='text-center font-weight-bold' color="success">
                    {this.state.success}
                </Alert>:''
            }
            <table >
                <th><input class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Search"/></th>
                <th><button class="btn btn-outline-success my-2 my-sm-0" type="button">Tìm kiếm</button></th>
                
               
            </table>
            <table class="table table-striped">
                <thead>
                    <tr style={{textAlign:"center",fontWeight:"bold"}}>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Điểm tích lũy</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        this.props.data_customer !== null?
                        (this.props.data_customer).map(i=>{
                return( <tr>
                            <th scope="row">{i.phone}</th>
                            <td>{i.point} điểm</td>
                            <td>{
                                i.disable===false?
                                <b>Hoạt động</b>:<b>Bị khóa</b>
                            }</td>
                            <td>
                                <button type="button" onClick={()=>this.show_detail(i._id)} title="Thông tin chi tiết" class="btn btn-info"><i class="fas fa-address-card"></i></button>
                                <button type="button" onClick={()=>this.show(i._id)} title="Thay đổi thông tin" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                <button type="button" onClick={()=>this.Block(i._id)} title="Kích hoạt/ Khóa tài khoản" class="btn btn-warning"><i class="fas fa-user-lock"></i></button>
                                <button type="button" title="Xóa tài khoản (Hiện tại nhà phát triển đang suy nghĩ về vấn đề trên)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>)
                        })
                       : <Alert className='text-center font-weight-bold' color="danger">
                                Hiện tại không có tài khoản nào!!!
                                </Alert>
                    }
                    
                </tbody>
            </table>
        </div>
    );
  }
}
export default connect((state)=>{
    return {data_customer:state.data_customer}
}) (component)