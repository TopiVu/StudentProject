import React, { Component } from 'react';
import { Row, Col, InputGroup, Button, FormControl, Modal} from 'react-bootstrap';
import { Map, Marker, TileLayer } from 'react-leaflet'
import {Alert} from 'reactstrap'
import {MDBBtn, MDBIcon,MDBContainer,MDBModal,MDBModalHeader,MDBModalBody,MDBAnimation,MDBModalFooter } from 'mdbreact';
import {connect} from 'react-redux'
import axios from 'axios'
import 'leaflet-routing-machine'
import 'leaflet-control-geocoder'
import L from 'leaflet'
import Header from './customer/component/header'
import io from "socket.io-client/dist/socket.io.js";
import cookie from 'react-cookies'
import car from './../img/driver_red.png'


var wp_img = L.icon({
  iconUrl:'https://www.google.com/maps/vt/icon/name=icons/spotlight/spotlight-poi-medium.png&scale=2',
  iconSize:[25,41],
  iconAnchor:[12.5,41],
  popupAnchor:[-10,-90]
})
var car_img = L.icon({
  iconUrl:car,
  iconSize:[40,41],
  iconAnchor:[12.5,41],
  popupAnchor:[-10,-90]
})

class component extends Component {
  async componentWillMount(){
      if(!cookie.load('customer_cookie')){
        this.props.history.push('/authentication_error')
    }
    var {dispatch}= this.props;
    await dispatch({type:'SET_PRICE',item:null})
    await dispatch({type:'SET_MESSAGE',item:null})
    await dispatch({type:'SET_DATA_PROFILE',item:null})
    await this.load_detail()
   
  }
  async load_profile(){
    var id = cookie.load('customer_cookie')
    await axios.post('http://localhost:8080/load_profile_ct',{id:id})
    .then(async (rs)=>{
        var value = rs.data
        var {dispatch} = this.props
       await dispatch({type:'SET_DATA_PROFILE',item:value})
    })
  }
  constructor(props){
    super(props);
    this.handleShow = this.handleShow.bind(this);
    this.handleClose = this.handleClose.bind(this);

    this.state = {
      show_complete: false,
      show_cancel:false,
    };
    this.socket = io("http://localhost:8080",{jsonp:false});
    this.socket.on('Change',async()=>{
      await this.get_pos();
      await this.load_detail()
    })
    this.socket.on('Canceled',async()=>{
      var id = cookie.load('customer_cookie')
      if(this.props.data_contract_boot!==null && this.props.data_contract_boot.customer._id===id)
          this.show_cancel()
      await this.load_detail();
    })
    this.socket.on('Completed',async()=>{
      var id = cookie.load('customer_cookie')
      if(this.props.data_contract_boot!==null && this.props.data_contract_boot.customer._id===id)
      {
        await this.show_complete()
        await this.load_detail();
      }
     
        
      
    })
   
  }
  async show_cancel(){
    await this.setState({ show_cancel: true});
  }
  async hide_cancel() {
      var {dispatch} = this.props
      await this.cancel_contract()
      await dispatch({type:'SET_CONTRACT_BOOT',item:null})
      await this.setState({ show_cancel: false});

  }
  async show_complete(){
    await this.setState({ show_complete: true});
  }
  async hide_complete() {
      await this.setState({ show_complete: false});

  }
  handleClose() {
    this.setState({ show: false });
  }

  handleShow() {
    this.setState({ show: true });
    console.log(this.props.data_contract_boot)
  }
  cancel_contract(){
    var id = cookie.load('customer_cookie')
    axios.post('http://localhost:8080/cancel_contract_map',{id:id})
    .then(rs=>{
      this.load_detail()
    })
  }
  Cancel(){
    var id = cookie.load('customer_cookie')
    axios.post('http://localhost:8080/cancel_contract_map',{id:id})
    .then(rs=>{
      this.load_detail()
      this.socket.emit('Client_Cancel')
    })
  }
  async load_detail(){
    var id = cookie.load('customer_cookie')
    await axios.post('http://localhost:8080/load_booting_client',{id:id})
    .then(async rs=>{
      var status = rs.data.status
      var value = rs.data.value
      var {dispatch} = this.props
      if (status===false)
      {
        await dispatch({type:'SET_CONTRACT_BOOT',item:null})
      }
      else{
        await dispatch({type:'SET_CONTRACT_BOOT',item:value})
      }
    })
  }
  async get_pos(){
    await axios.get('http://localhost:8080/get_pos')
    .then(rs=>{
      var status = rs.data.status;
      var message = rs.data.value;
      var {dispatch} = this.props;
      if(status===false)
      {
        console.log(message)
        dispatch({type:'SET_DATA_POS',item:null})
      }
      else{
        dispatch({type:'SET_DATA_POS',item:message})
        console.log(this.props.data_pos)
      }
    })
  }
  async componentDidMount(){
    this.load_profile()
   
    this.routing_machine()
    var paypal = this.props.data_profile.paypal
    console.log(paypal)
    await axios.get('http://localhost:8080/get_pos')
    .then(rs=>{
      var status = rs.data.status;
      var message = rs.data.value;
      if(status===false)
      {
        console.log(message)
      }
      else{
        var {dispatch} = this.props;
        dispatch({type:'SET_DATA_POS',item:message})
      }
    })
}
  routing_machine(){
    var {dispatch} = this.props;
    const map = this.leafletMap.leafletElement;
    function createButton(label, container) {
        var btn = L.DomUtil.create('button', '', container);
        btn.setAttribute('type', 'button');
        btn.innerHTML = label;
        return btn;
    }
    var control = L.Routing.control({
      waypoints: [
          L.latLng(null, null),
          L.latLng(null, null)
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
					
					icon: wp_img
					
				}).addTo(map);
       
      }}).addTo(map)
    control.on('routesfound', function (e) {
      var distance = e.routes[0].summary.totalDistance; 
      var start = e.routes[0].inputWaypoints[0].latLng
      var end = e.routes[0].inputWaypoints[1].latLng
      var price = (Math.ceil(distance/1000))*2000+11000
      var route= e.routes[0].name
      dispatch({type:'SET_KM',item:distance})
      dispatch({type:'SET_START',item:start})
      dispatch({type:'SET_END',item:end})
      dispatch({type:'SET_PRICE',item:price})
      dispatch({type:'SET_VALUE_ROUTE',item:route})
      return distance;
    });
    map.on('click', function(e) {
        var container = L.DomUtil.create('div'),
            startBtn = createButton('Điểm đón ', container),
            destBtn = createButton('Điểm đến', container);
    
        L.popup()
            .setContent(container)
            .setLatLng(e.latlng)
            .openOn(map);
        L.DomEvent.on(startBtn, 'click', function() {
          control.spliceWaypoints(0, 1, e.latlng);
          map.closePopup();
          });
        L.DomEvent.on(destBtn, 'click', function() {
          control.spliceWaypoints(control.getWaypoints().length - 1, 1, e.latlng);
          map.closePopup();
          });
    });
  }
  bootCar(){
    var km = this.props.value_km
    var start = this.props.value_start
    var end = this.props.value_end
    var route = this.props.value_route
    var id = cookie.load('customer_cookie')
    var paypal = this.props.data_profile.paypal
    var price_default = 11000
    var price_km = 2000
    console.log(km)
    console.log(start)
    axios.post('http://localhost:8080/math_pos',{
      km : km,
      start:start,
      end:end,
      id :id,
      route: route,
      paypal:paypal,
      price_default:price_default,
      price_km:price_km
    })
    .then(async(rs)=>{
      var status = rs.data.status
      var value = rs.data.value
      var {dispatch} = this.props
      if(status===false)
      {
        dispatch({type:'SET_MESSAGE',item:value})
      }
      else{
        await dispatch({type:'SET_MESSAGE',item:null})
        await this.socket.emit('Booting')
        await dispatch({type:'SET_CONTRACT_BOOT',item:value})
        await this.get_pos()
        await this.handleShow()
      }
    })
  }
 
  render() {
    
    const position = [10.762924, 106.6827]
    return (
        <div >
          <Header />
          <MDBContainer className="text-center mt-5 pt-5">
            </MDBContainer>
          { this.props.price !==null ?
              <Alert className='text-center font-weight-bold' color="primary ">
                Cước phí chuyến đi là: {this.props.price} VNĐ
              </Alert>:''
            }
          <div className="row">
            <div className="col">
            {
            this.props.data_contract_boot !== null?
            <MDBBtn onClick={()=>this.handleShow()} className="btn btn-outline-blue" type="button">
                      Thông tin chuyến đi
                      <MDBIcon icon="eye" className="ml-3"  />
                  </MDBBtn>:''}
            </div>
            <div className="col"></div >
            <div className="col-2">
              <MDBBtn onClick={()=>this.bootCar()} className="btn btn-outline-blue" type="button">
                      Đặt Xe
                      <MDBIcon far icon="paper-plane" className="ml-3" />
                  </MDBBtn>
            </div >
            <div className="col">
            </div >
            <div className="col"></div >
          </div>
          
            { this.props.message !==null ?
              <Alert className='text-center font-weight-bold' color="danger">
                {this.props.message}
              </Alert>:''
            }
            <Map style={{position:'fixed',width:'100%'}}  className="map" center={position} zoom={15} ref={m => {this.leafletMap = m; }}  >
              <TileLayer
              url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
              attribution="&copy; <a href=&quot;http://osm.org/copyright&quot;>OpenStreetMap</a> contributors"
              />
              {
                this.props.data_pos !==null?
                (this.props.data_pos).map((i)=>{
                  return(
                    <Marker id={i} key={i} position={i} icon={car_img}>
                    </Marker>
                  )
                }):''
              }
  
            </Map>
          
          
              
          {
            this.props.data_contract_boot !== null?
            (<Modal show={this.state.show} onHide={this.handleClose}>
              <Modal.Header closeButton>
                <Modal.Title>Thông tin chuyến xe</Modal.Title>
              </Modal.Header>

              <Modal.Body>
                  <Row>
                    <Col><b>Tên khách hàng :</b></Col>
                    <Col>{this.props.data_contract_boot.customer.name}</Col>
                  </Row>
                  <Row>
                    <Col><b>Tên tài xế</b></Col>
                    <Col>{this.props.data_contract_boot.steersman.name}</Col>
                  </Row>
                  <Row>
                    <Col><b>Biển số</b></Col>
                    <Col>{this.props.data_contract_boot.steersman.number_plate}</Col>
                  </Row>
                  <Row>
                    <Col><b>Số điện thoại:</b></Col>
                    <Col>{this.props.data_contract_boot.steersman.phone}</Col>
                  </Row>
                  <Row>
                    <Col><b>Ngày :</b></Col>
                    <Col>{this.props.data_contract_boot.date_create}</Col>
                  </Row>
                  <Row>
                    <Col><b>Cước phí :</b></Col>
                    <Col>{this.props.data_contract_boot.postage} VNĐ</Col>
                  </Row>
                  <Row><hr/></Row>
                  <Button onClick={()=>this.Cancel()} style={{width:"50%",marginLeft:"50%"}} variant="danger" block>Hủy</Button>
                  <Row>
                    <Col>
                      <b>Nhận xét về chuyến đi</b>
                      <InputGroup className = "mb-3">
                        <FormControl as="textarea"
                          placeholder = "Nhận xét của bạn..."
                        />
                      </InputGroup>
                      <Button variant="primary" block>Gửi</Button>
                      </Col>
                  </Row>            
              </Modal.Body>
            </Modal> ):'' 
          }
          
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
               
              <MDBModal isOpen={this.state.show_complete} toggle={()=>this.show_complete()} backdrop={false}> 
              <MDBModalHeader toggle={()=>this.hide_complete()} className="tempting-azure-gradient"
              style={{height: "40px"}}>          
              </MDBModalHeader>
              <MDBModalBody style={{fontFamily: "Verdana", textAlign: "center"}}>
                <MDBAnimation type="bounce" infinite>
                  <MDBIcon icon="star" className="orange-text mr-3" size="lg"></MDBIcon>
                  <MDBIcon icon="star" className="yellow-text mr-3" size="lg"></MDBIcon>
                  <MDBIcon icon="star" className="green-text mr-3" size="lg"></MDBIcon>
                </MDBAnimation>
                <br></br>
                <b style={{fontSize: "120%"}}>Chúc mừng bạn đã đặt xe thành công!.</b>
              </MDBModalBody>
              <MDBModalFooter className="tempting-azure-gradient" style={{height: "20px"}}>
              </MDBModalFooter>
            </MDBModal>
          
        </div>  
    )
  }
}
export default connect((state)=>{
    return {message: state.message,
      data_pos:state.data_pos,
      value_km:state.value_km,
      value_start:state.value_start,
      value_end:state.value_end,
      data_contract_boot:state.data_contract_boot,
      price:state.price,
      value_route:state.value_route,
      data_profile:state.data_profile
    }
})(component)