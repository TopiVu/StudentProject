import React from "react";
import { MDBContainer, MDBRow, MDBCol, MDBBtn, MDBIcon,
  MDBModalHeader,MDBModalBody,MDBModal,MDBModalFooter,MDBAnimation,MDBCarousel,MDBCarouselInner,MDBCarouselItem,
  MDBView,MDBTable,MDBTableHead,MDBTableBody,MDBInput } from 'mdbreact';
import { Row, Col, Button,  Card, Alert} from 'react-bootstrap';
import {connect} from 'react-redux'
import { Map, TileLayer } from 'react-leaflet'
import axios from 'axios'
import cookie from 'react-cookies'
import {withRouter} from 'react-router-dom'
import io from "socket.io-client/dist/socket.io.js";
import 'leaflet'
import 'leaflet-routing-machine'
import 'leaflet-control-geocoder'
import L from 'leaflet'
var pos_img = L.icon({
  iconUrl:'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAApCAYAAADAk4LOAAAFgUlEQVR4Aa1XA5BjWRTN2oW17d3YaZtr2962HUzbDNpjszW24mRt28p47v7zq/bXZtrp/lWnXr337j3nPCe85NcypgSFdugCpW5YoDAMRaIMqRi6aKq5E3YqDQO3qAwjVWrD8Ncq/RBpykd8oZUb/kaJutow8r1aP9II0WmLKLIsJyv1w/kqw9Ch2MYdB++12Onxee/QMwvf4/Dk/Lfp/i4nxTXtOoQ4pW5Aj7wpici1A9erdAN2OH64x8OSP9j3Ft3b7aWkTg/Fm91siTra0f9on5sQr9INejH6CUUUpavjFNq1B+Oadhxmnfa8RfEmN8VNAsQhPqF55xHkMzz3jSmChWU6f7/XZKNH+9+hBLOHYozuKQPxyMPUKkrX/K0uWnfFaJGS1QPRtZsOPtr3NsW0uyh6NNCOkU3Yz+bXbT3I8G3xE5EXLXtCXbbqwCO9zPQYPRTZ5vIDXD7U+w7rFDEoUUf7ibHIR4y6bLVPXrz8JVZEql13trxwue/uDivd3fkWRbS6/IA2bID4uk0UpF1N8qLlbBlXs4Ee7HLTfV1j54APvODnSfOWBqtKVvjgLKzF5YdEk5ewRkGlK0i33Eofffc7HT56jD7/6U+qH3Cx7SBLNntH5YIPvODnyfIXZYRVDPqgHtLs5ABHD3YzLuespb7t79FY34DjMwrVrcTuwlT55YMPvOBnRrJ4VXTdNnYug5ucHLBjEpt30701A3Ts+HEa73u6dT3FNWwflY86eMHPk+Yu+i6pzUpRrW7SNDg5JHR4KapmM5Wv2E8Tfcb1HoqqHMHU+uWDD7zg54mz5/2BSnizi9T1Dg4QQXLToGNCkb6tb1NU+QAlGr1++eADrzhn/u8Q2YZhQVlZ5+CAOtqfbhmaUCS1ezNFVm2imDbPmPng5wmz+gwh+oHDce0eUtQ6OGDIyR0uUhUsoO3vfDmmgOezH0mZN59x7MBi++WDL1g/eEiU3avlidO671bkLfwbw5XV2P8Pzo0ydy4t2/0eu33xYSOMOD8hTf4CrBtGMSoXfPLchX+J0ruSePw3LZeK0juPJbYzrhkH0io7B3k164hiGvawhOKMLkrQLyVpZg8rHFW7E2uHOL888IBPlNZ1FPzstSJM694fWr6RwpvcJK60+0HCILTBzZLFNdtAzJaohze60T8qBzyh5ZuOg5e7uwQppofEmf2++DYvmySqGBuKaicF1blQjhuHdvCIMvp8whTTfZzI7RldpwtSzL+F1+wkdZ2TBOW2gIF88PBTzD/gpeREAMEbxnJcaJHNHrpzji0gQCS6hdkEeYt9DF/2qPcEC8RM28Hwmr3sdNyht00byAut2k3gufWNtgtOEOFGUwcXWNDbdNbpgBGxEvKkOQsxivJx33iow0Vw5S6SVTrpVq11ysA2Rp7gTfPfktc6zhtXBBC+adRLshf6sG2RfHPZ5EAc4sVZ83yCN00Fk/4kggu40ZTvIEm5g24qtU4KjBrx/BTTH8ifVASAG7gKrnWxJDcU7x8X6Ecczhm3o6YicvsLXWfh3Ch1W0k8x0nXF+0fFxgt4phz8QvypiwCCFKMqXCnqXExjq10beH+UUA7+nG6mdG/Pu0f3LgFcGrl2s0kNNjpmoJ9o4B29CMO8dMT4Q5ox8uitF6fqsrJOr8qnwNbRzv6hSnG5wP+64C7h9lp30hKNtKdWjtdkbuPA19nJ7Tz3zR/ibgARbhb4AlhavcBebmTHcFl2fvYEnW0ox9xMxKBS8btJ+KiEbq9zA4RthQXDhPa0T9TEe69gWupwc6uBUphquXgf+/FrIjweHQS4/pduMe5ERUMHUd9xv8ZR98CxkS4F2n3EUrUZ10EYNw7BWm9x1GiPssi3GgiGRDKWRYZfXlON+dfNbM+GgIwYdwAAAAASUVORK5CYII=',
  iconSize:[25,41],
  iconAnchor:[12.5,41],
  popupAnchor:[-10,-90]
})

 class component extends React.Component {
   constructor(props){
     super(props);
      this.socket = io("http://localhost:8080",{jsonp:false});

      this.socket.on('Booted',()=>{
        this.update_booting()
        var {dispatch} = this.props
        dispatch({type:'SET_ACTIVE',item:'disable'})
      }) 
      this.socket.on('Client_Canceled',async()=>{
        var id = cookie.load('st_cookie')
        if(this.props.data_chuyen !==null && this.props.data_chuyen.steersman._id === id)
        {
         await this.show_cancel()
         await this.active()
         await this.update_booting()
        }
         
       
        
      })
      this.state = {
        show: false,
        show_update_pass:false,
        show_detail:false,
        show_route:false,
        show_cancel:false,
        data_detail:null,
        message:null,
        success:null,
        data_history:null
      };
   }
   async show_cancel(){
    await this.setState({ show_cancel: true});
  }
    async hide_cancel() {
      await this.setState({ show_cancel: false});

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
    async show_detail() {
     
      await this.setState({ show_detail: true});
    }
    hide_detail() {
      this.setState({ show_detail: false});
     
    }
    async show_route_detail(a,b){
      await this.setState({ show_route: true});
      await this.routing_machine(a,b)
    }
    async show_route() {
      await this.setState({ show_route: true});
      await this.routing_machine(this.props.data_chuyen.start,this.props.data_chuyen.end)
    }
    hide_route() {
      this.setState({ show_route: false});
     
    }
    async load_history(){
      var id = cookie.load('st_cookie')
      await axios.post('http://localhost:8080/load_history_st',{id:id})
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
   async update_booting(){
    var id = cookie.load('st_cookie')
    await axios.post('http://localhost:8080/load_booting',{id:id})
    .then(rs=>{
      var status = rs.data.status
      var value = rs.data.value
      var {dispatch} = this.props
      if(status===true){
        dispatch({type:'SET_DATA_CHUYEN',item:value})
        
       }
       
    })
   }
  async componentDidMount(){
   
    var id = cookie.load('st_cookie')
    await axios.post('http://localhost:8080/load_profile_st',{id:id})
    .then(async (rs)=>{
        var value = rs.data
        var {dispatch} = this.props
       await dispatch({type:'SET_DATA_PROFILE',item:value})
       if(value.status ===false)
       {
          dispatch({type:'SET_ACTIVE',item:'disable'})
       }
       else{
          dispatch({type:'SET_ACTIVE',item:'active'})
       }
    })
    await this.update_booting()
  }
     async active(){
      var {dispatch} = this.props
      var id = cookie.load('st_cookie')
      await axios.post('http://localhost:8080/steersman_active',{id:id})
      await dispatch({type:'SET_ACTIVE',item:'active'})
      this.socket.emit('Change_state')
     
     }
     async disable(){
      var {dispatch} = this.props
      var id = cookie.load('st_cookie')
      await axios.post('http://localhost:8080/steersman_disable',{id:id})
      await dispatch({type:'SET_ACTIVE',item:'disable'})
      this.socket.emit('Change_state')
     }
    complete(id){
      var st_id = cookie.load('st_cookie')
      var ct_id = this.props.data_chuyen.customer._id
      var price = this.props.data_chuyen.postage
      axios.post('http://localhost:8080/complete',{
        id:id,
        st_id:st_id,
        ct_id:ct_id,
        price:price
      })
      .then(async(rs)=>{
        var {dispatch} = this.props
        await dispatch({type:'SET_DATA_CHUYEN',item:null})
        await dispatch({type:'SET_ACTIVE',item:'active'})
        await this.socket.emit('Change_state')
        await this.socket.emit('Complete')
      })
    }
    cancel(id){
      axios.post('http://localhost:8080/cancel_contract',{id:id})
      .then(rs=>{
        this.socket.emit('Cancel')
        this.active()
        this.update_booting()
      })
    }
    routing_machine(a,b){
      const map = this.leafletMap.leafletElement;
      L.Routing.control({
        waypoints: [
            // L.latLng(10.769630875675,106.678276062012),
            // L.latLng(13.3167986682154,108.825073242188)
            L.latLng(a),
            L.latLng(b)
        ],
        waypointNameFallback: function(latLng) {
          function zeroPad(n) {
              n = Math.round(n);
              return n < 10 ? '0' + n : n;
          }
          function sexagesimal(p, pos, neg) {
              var n = Math.abs(p),
                  degs = Math.floor(n),
                  mins = (n - degs) * 60,
                  secs = (mins - Math.floor(mins)) * 60,
                  frac = Math.round((secs - Math.floor(secs)) * 100);
              return (n >= 0 ? pos : neg) + degs + '°' +
                  zeroPad(mins) + '\'' +
                  zeroPad(secs) + '.' + zeroPad(frac) + '"';
          }
  
          return sexagesimal(latLng.lat, 'N', 'S') + ' ' + sexagesimal(latLng.lng, 'E', 'W');
          },
         
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: true,
        reverseWaypoints: true,
        createMarker: function(i,wp) {
          return L.marker(wp.latLng, {
            
            draggable: true,
            
            icon: pos_img
            
          }).addTo(map);
         }
        }).addTo(map)
    }
  render() {
    const position = [10.762924, 106.6827]
  
    return (
       <div>
         <MDBContainer className="text-center mt-5 pt-5"></MDBContainer>
        <MDBRow>
        <Col md="5">
            <div className = "border border-primary border-bottom-0 border-left-0 border-top-0"
              style = {{alignItems: "center",paddingLeft: "15px", paddingTop: "10px"}}>         
                <Row style={{textAlign:"center"}}>
                  <Col>
                    <h3>Thông tin cá nhân</h3>
                    <hr></hr>
                  </Col>
                </Row>
                <br/>
                <Row className="justify-content-md-center">
                  <Col md = "auto">
                    <Card style={{width: "180px", height: "200px", paddingLeft: "5px", paddingTop: "5px"}}>
                      <Card.Img variant = "top"  src={require('./../../../img/xe.png')} roundedCircle></Card.Img>
                    </Card>
                    <Button style={{width: "100%"}} >Thay đổi</Button>
                  </Col>
                  <Col md = "auto">
                    <Card style={{width: "180px", height: "200px", paddingLeft: "5px", paddingTop: "5px"}}>
                      <Card.Img variant = "top" src={require('./../../../img/xe.png')}roundedCircle></Card.Img>
                    </Card>
                    <Button style={{width: "100%"}}>Thay đổi</Button>
                  </Col>
                </Row>
                <br></br>
                <Row >
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Tên tài khoản :</b> </Alert></Col>
                  <Col ><Alert className="p-1">{this.props.data_profile.name}</Alert></Col>
                </Row>
                <Row>
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Ngày gia nhập :</b> </Alert></Col>
                  <Col><Alert className="p-1">{this.props.data_profile.date_active}</Alert></Col>
                </Row>
                <Row>
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Tuổi :</b> </Alert></Col>
                  <Col><Alert className="p-1">{this.props.data_profile.age}</Alert></Col>
                </Row>
                <Row>
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Biển số xe :</b> </Alert></Col>
                  <Col><Alert className="p-1">{this.props.data_profile.number_plate}</Alert></Col>
                </Row>
                <Row>
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Tọa độ hiện tại :</b> </Alert></Col>
                  <Col><Alert className="p-1">{this.props.data_profile.lat} | {this.props.data_profile.lng}</Alert></Col>
                </Row>
                <Row>
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Số dư tài khoản :</b> </Alert></Col>
                  <Col><Alert className="p-1">{this.props.data_profile.paypal}</Alert></Col>
                </Row>
                <Row>
                  <Col md={{ span: 5, offset: 1 }}><Alert className="p-1"><b>Trạng thái :</b> </Alert></Col>
                  <Col>
                  {this.props.active ==='active'?
                    <Alert className="p-1">Đang hoạt động</Alert>:<Alert className="p-1">Đã ngừng hoạt động</Alert>
                  }
                  </Col>
                </Row>
            </div> 
          </Col>  
            {/* CỘT 2 : BUTTON - CHUYẾN - TIN TỨC */}
            <MDBCol size="7">
              {/* HÀNG 1 : BUTTON */}
              <MDBRow  style={{marginRight:"1px"}}>
                <MDBCol>
                {
                  this.props.active ==='active'?
                  <MDBBtn onClick={()=>this.disable()} className="btn btn-outline-blue w-100">
                    Đang hoạt động
                    
                    <MDBIcon far icon="laugh" className="ml-3" size="lg"/>
                  </MDBBtn>:<MDBBtn onClick={()=>this.active()} className="btn btn-outline-blue w-100">
                  Đã ngừng hoạt động
                    <MDBIcon far icon="frown" className="ml-3" size="lg"/>
                  </MDBBtn>
                }
                </MDBCol>
                <MDBCol>
                  <MDBBtn onClick={()=>this.show_update_pass()} className="btn btn-outline-blue w-100">
                    Cập nhật mật khẩu
                    <MDBIcon icon="key" className="ml-3" size="lg"/>
                  </MDBBtn>
                </MDBCol>
              </MDBRow>

              {/* HÀNG 2 : BUTTON */}
              <MDBRow style={{marginRight:"1px"}}>
                <MDBCol size="12">
                  <MDBBtn onClick={()=>this.show()} className="btn btn-outline-blue w-100">
                    Lịch sử chuyến đi
                    <MDBIcon far icon="file" className="ml-3" size="lg"/>
                  </MDBBtn>
                </MDBCol>
              </MDBRow>
              <hr></hr> 
              {
                this.props.data_chuyen !==null?
              (<MDBRow style={{marginRight:"1px"}}s>  
                <MDBCol className="ml-3" size="4">
                  <MDBRow>
                    <p className="m-3">Họ tên khách hàng : </p>
                  </MDBRow>
                  <MDBRow>
                    <p className="m-3">Số điện thoại : </p>
                  </MDBRow>
                  <MDBRow>
                    <p className="m-3">Chi phí : </p>                  
                  </MDBRow>
                  <MDBRow>
                    <p className="m-3">Tuyến đường : </p>                  
                  </MDBRow>
                </MDBCol>
                <MDBCol>
                    <MDBRow>
                      <p className="m-3"><b>{this.props.data_chuyen.customer.name}</b></p>
                    </MDBRow>
                    <MDBRow>
                      <p className="m-3"><b>{this.props.data_chuyen.customer.phone}</b></p>
                    </MDBRow>
                    <MDBRow>
                      <p className="m-3"><b>{this.props.data_chuyen.postage} VNĐ</b></p>
                    </MDBRow>
                    <MDBRow>
                      <p className="m-3"><b>{this.props.data_chuyen.route}</b></p>
                    </MDBRow>
                </MDBCol>
                <MDBCol>                                    
                    <MDBBtn style={{width:"100%"}} onClick={()=>this.complete(this.props.data_chuyen._id)}  className="btn btn-outline-purple" type="">
                      Hoàn tất
                      <MDBIcon far icon="paper-plane" className="ml-2" />
                    </MDBBtn>
                    <MDBBtn style={{width:"100%"}}  onClick={()=>this.cancel(this.props.data_chuyen._id)} className="btn btn-outline-purple" type="">
                     Hủy
                      <MDBIcon far icon="paper-plane" className="ml-2" />
                    </MDBBtn>
                    <MDBBtn style={{width:"100%"}}  onClick={()=>this.show_route()} className="btn btn-outline-purple" type="">
                      Tuyến đường
                      <MDBIcon far icon="paper-plane" className="ml-2" />
                    </MDBBtn>
                </MDBCol>
              </MDBRow>):<Alert className='text-center font-weight-bold' color="info">
                Chưa có khách đặt !!! 
              </Alert>}
              <hr></hr> 

              {/* HÀNG 4 : TIN TỨC */}
              <MDBRow>
              <MDBCol>
                {/* HÀNG 4.1 : TIÊU ĐỀ */}
                <MDBRow className="text-center" >
                  <MDBCol style={{fontSize: "150%", color: "blue"}}>
                    <p><b>TIN TỨC</b></p>
                  </MDBCol>
                </MDBRow>

                {/* HÀNG 4.2 */}
                <MDBRow>
                  <MDBContainer  className="m-3">
                    <MDBCarousel activeItem={1} length={3}  className="z-depth-1"
                                  showControls={true} showIndicators={true}
                    >
                      <MDBCarouselInner>
                        <MDBCarouselItem itemId="1">
                          <MDBView>
                            <img
                              className="d-block w-100"
                              src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                              alt="First slide"
                            />
                          </MDBView>
                        </MDBCarouselItem>
                        <MDBCarouselItem itemId="2">
                          <MDBView>
                            <img
                              className="d-block w-100"
                              src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                              alt="Second slide"
                            />
                          </MDBView>
                        </MDBCarouselItem>
                        <MDBCarouselItem itemId="3">
                          <MDBView>
                            <img
                              className="d-block w-100"
                              src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
                              alt="Third slide"
                            />
                          </MDBView>
                        </MDBCarouselItem>
                      </MDBCarouselInner>
                    </MDBCarousel>
                  </MDBContainer>
                </MDBRow>
              </MDBCol>
              </MDBRow>

            </MDBCol>  
        </MDBRow>
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
                    <th>Khách hàng</th>
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
                          <td>{i.customer.name}</td>
                          <td>{i.postage} VNĐ</td>
                          <td>
                            <MDBBtn onClick={()=>this.show_route_detail(i.start,i.end)} outline color="primary" >
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
        <MDBModal isOpen={this.state.show_cancel} toggle={()=>this.show_cancel()} backdrop={false}> 
              <MDBModalHeader toggle={()=>this.hide_cancel()} className="tempting-azure-gradient"
              style={{height: "40px"}}>          
              </MDBModalHeader>
              <MDBModalBody style={{fontFamily: "Verdana", textAlign: "center"}}>
                <MDBAnimation type="bounce" infinite>
                  <MDBIcon icon="star" className="orange-text mr-3" size="lg"></MDBIcon>
                  <MDBIcon icon="star" className="yellow-text mr-3" size="lg"></MDBIcon>
                  <MDBIcon icon="star" className="green-text mr-3" size="lg"></MDBIcon>
                </MDBAnimation>
                <br></br>
                <b style={{fontSize: "120%"}}>Xin lỗi! Chuyến xe của bạn đã bị hủy.</b>
              </MDBModalBody>
              <MDBModalFooter className="tempting-azure-gradient" style={{height: "20px"}}>
              </MDBModalFooter>
            </MDBModal>
      <MDBContainer>     
      <MDBModal isOpen={this.state.show_route} toggle={()=>this.show_route()} size="lg"> 
        <MDBModalHeader className="rare-wind-gradient"  toggle={()=>this.hide_route()} >
          Tuyến đường di chuyển
        </MDBModalHeader>
        <MDBModalBody>
          <Map style={{width:'100%',height:"480px"}} center={position} zoom={15} ref={m => {this.leafletMap = m; }}  >
                <TileLayer
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                attribution="&copy; <a href=&quot;http://osm.org/copyright&quot;>OpenStreetMap</a> contributors"
                />
          </Map>
        </MDBModalBody>
        
        <MDBModalFooter className="rare-wind-gradient"  style={{ height: "20px"}}>
        </MDBModalFooter>
      </MDBModal> 
    </MDBContainer>   
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
  return {active:state.active,
    data_profile:state.data_profile,
    data_chuyen:state.data_chuyen
  }
}) (withRouter(component))