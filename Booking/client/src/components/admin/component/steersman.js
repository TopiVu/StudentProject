import React, { Component } from 'react';
import axios from 'axios'
import {Alert} from 'reactstrap'
import {connect} from 'react-redux'
import { MDBInput, MDBBtn, MDBContainer, 
    MDBModal, MDBModalBody, MDBModalHeader, MDBModalFooter,
    MDBCard, MDBCardBody, MDBCardImage,MDBRow,MDBCol,MDBCardText,MDBIcon } 
    from "mdbreact";
class component extends Component {
    constructor(props){
        super(props);
    
        this.state = {
          show: false,
          data_detail:null,
          show_detail:false,
          message:null,
          success:null,
        };
          
    }
    componentWillMount(){
      this.load_steersman()
    }
    load_steersman(){
        axios.post('http://localhost:8080/get_steersman')
        .then(rs=>{
            var {dispatch} = this.props
            var status = rs.data.status
            var value = rs.data.value
            if(status ===true){
                dispatch({type:"SET_DATA_STEERSMAN",item:value})
            }
        }) 
    }
    async show_detail(id) {
        await this.load_detail(id)
        await this.setState({ show_detail: true});
    }
    hide_detail() {
        this.setState({ show_detail: false});
       
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
    async load_detail(id){
        await axios.post('http://localhost:8080/detail_st',{id:id})
        .then(async rs=>{
            var status= rs.data.status
            var value = rs.data.value
            if(status === true)
               await this.setState({data_detail:value})
        })
    }
    Block(id){
        axios.post('http://localhost:8080/block_st',{id:id})
        .then(rs=>{
            var status= rs.data.status
            if(status === true)
                this.load_steersman()
        })
    }
    async Save(id){
        var a = document.getElementById('a').value;
        var b = document.getElementById('b').value;
        var c = document.getElementById('c').value;
        var d = document.getElementById('d').value;
        var e = document.getElementById('e').value;
        var f = document.getElementById('f').value;
        var g = document.getElementById('g').value;
        var h = document.getElementById('h').value;
        
        if (a==='')
            a = document.getElementById('a').placeholder
        if (b==='')
            b = document.getElementById('b').placeholder
        if (c==='')
            c = document.getElementById('c').placeholder
        if (d==='')
            d = document.getElementById('d').placeholder
        if (e==='')
            e = document.getElementById('e').placeholder
        if (f==='')
            f = document.getElementById('f').placeholder
        if (g==='')
            g = document.getElementById('g').placeholder
        if (h==='')
            h = document.getElementById('h').placeholder
        await axios.post('http://localhost:8080/update_st',{
            id:id,
            phone:a,
            name:b,
            cmnd:c,
            password:d,
            age:e,
            number_plate:f,
            lat:g,
            lng:h
        })
        .then(rs=>{
            var status = rs.data.status
            var value = rs.data.value
            if(status ===false)
            {   
               this.setState({message:value})
            }
            else{
                this.load_steersman()
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
          <MDBModalHeader toggle={()=>this.hide()} className="young-passion-gradient" style={{color: "white"}}>
            Cập nhật thông tin tài xế
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
                <MDBInput id="a" label="Tài khoản" hint={this.state.data_detail.phone} type="number" icon="phone"/>
                <MDBInput id="b" label="Tên tài xế" hint={this.state.data_detail.name} icon="user"/>
                <MDBInput id="c" label="Chứng minh nhân dân" hint={this.state.data_detail.cmnd} type="number" icon="address-card" />
                <MDBInput id="d" label="Mật khẩu" hint={this.state.data_detail.password} icon="lock" type="text"/>
                <MDBInput id="e" label="Tuổi" hint={this.state.data_detail.age} type="number" icon="calendar-alt" /> 
                <MDBInput id="f" label="Biển số xe" hint={this.state.data_detail.number_plate} icon="motorcycle" />
                <MDBInput id="g" label="Vĩ độ (X)" hint={this.state.data_detail.lat} icon="map-marker-alt" />
                <MDBInput id="h" label="Kinh độ (Y)" hint={this.state.data_detail.lng} icon="map-marker-alt" />
                
                <MDBContainer>
                  <MDBRow>
                    <MDBCol>
                      <MDBCard className="text-center" style={{ width: "100%"}}>
                        <div className="align-self-center">
                          <MDBCardImage className="img-fluid" src={require('./xe.png')} waves />
                          <MDBCardBody>
                            <MDBCardText><b>Ảnh đại diện</b></MDBCardText>
                            <MDBBtn outline color="orange" size="sm">Chọn ảnh khác</MDBBtn>
                          </MDBCardBody>
                        </div>
                      </MDBCard>
                    </MDBCol>
                    <MDBCol>
                      <MDBCard className="text-center" style={{ width: "100%"}}>
                        <div className="align-self-center">
                          <MDBCardImage className="img-fluid" src={require('./xe.png')} waves />
                          <MDBCardBody>
                            <MDBCardText>Ảnh phương tiện</MDBCardText>
                            <MDBBtn outline color="orange" size="sm">Chọn ảnh khác</MDBBtn>
                          </MDBCardBody>
                        </div>
                      </MDBCard>
                    </MDBCol>
                  </MDBRow>
                </MDBContainer>
                
              </div>                   
          </MDBModalBody>:''
          }
           {
                this.state.data_detail !== null?
          <MDBModalFooter className="young-passion-gradient" style={{color: "white"}}>
            <MDBBtn onClick={()=>this.Save(this.state.data_detail._id)} size="lg" gradient="young-passion">
              <b>Hoàn tất</b>
            </MDBBtn>
          </MDBModalFooter>:''
           }
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
                  <MDBCard  style={{ width: "80%"}}>
                      <MDBCardImage className="img-fluid" src={require('./xe.png')} waves />
                  </MDBCard>
                  <br></br>
                  <MDBCard  style={{ width: "80%"}}>
                      <MDBCardImage className="img-fluid" src={require('./xe.png')} waves />
                  </MDBCard>
                </MDBCol>

                {/* CỘT 2 */}
                <MDBCol size="3">
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="user" size="2x" className="m-0"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Họ tên</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.name}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="barcode" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>CMND</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.cmnd}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow> 
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="phone" size="2x" className="m-0"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Số điện thoại</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.phone}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow> 
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="lock" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Mật khẩu</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.password}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>                       
                </MDBCol>

                {/* CỘT 3 */}
                <MDBCol size="3">
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="calendar-alt" size="2x" className="m-0"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Ngày gia nhập</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.date_create}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow> 
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="birthday-cake" size="2x" className="m-0"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Tuổi</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.age}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow> 
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="map-marker-alt" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Vĩ độ (X)</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.lat}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="map-marker-alt" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Kinh độ (Y)</p>
                      <p  style={{margin: "0"}}>{this.state.data_detail.lng}</p>
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                        
                </MDBCol>

                {/* CỘT 4 */}
                <MDBCol size="3">
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
                      {this.state.data_detail.status ===true?
                        <p  style={{margin: "0"}}>Đang chạy</p>:<p  style={{margin: "0"}}>Ngưng</p>
                        }
                      <hr style={{marginTop: "10px"}}></hr>
                      </MDBCol>
                  </MDBRow>
                  <MDBRow>
                    <MDBCol size="3">
                      <MDBIcon icon="credit-card" size="2x"></MDBIcon>
                    </MDBCol>
                    <MDBCol size="9">
                      <p style={{fontSize: "75%", color: "gray", margin: "0"}}>Trạng thái tài khoản</p>
                      {this.state.data_detail.disable ===false?
                        <p  style={{margin: "0"}}>Hoạt động</p>:<p  style={{margin: "0"}}>Đã bị khóa</p>
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
                <MDBModalFooter className="peach-gradient d-inline-block" style={{height: "57px"}}>
                <div className="float-none text-center" style={{color: "white", fontSize: "120%"}}>
                    <b>#ID: </b> <b>{this.state.data_detail._id}</b>
                </div>
                </MDBModalFooter>:''
            }
          </MDBModal>  
        </MDBContainer>      
            <h1>Quản Lý Tài Xế</h1>
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
                    <th scope="col">Thu nhập</th>
                    <th scope="col">Hoạt động</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        this.props.data_steersman !== null?
                        (this.props.data_steersman).map(i=>{
                return( <tr>
                            <th scope="row">{i.phone}</th>
                            <td>{i.paypal} VNĐ</td>
                            <td>{
                                i.status===true?
                                <b>Chạy</b>:<b>Ngừng</b>
                            }</td>
                            <td>{
                                i.disable===false?
                                <b>Hoạt động</b>:<b>Bị khóa</b>
                            }</td>
                            <td>
                                <button type="button" onClick={()=>this.show_detail(i._id)} title="Thông tin chi tiết" class="btn btn-info"><i class="fas fa-address-card"></i></button>
                                <button type="button" onClick={()=>this.show(i._id)} title="Thay đổi thông tin" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                <button type="button" onClick={()=>this.Block(i._id)} title="Kích hoạt/ Khóa tài khoản" class="btn btn-warning"><i class="fas fa-user-lock"></i></button>
                                <button type="button" title="Xóa tài khoản" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
    return {data_steersman:state.data_steersman}
}) (component)