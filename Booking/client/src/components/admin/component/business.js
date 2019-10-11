import React, { Component } from 'react';
import { MDBContainer, MDBBtn,MDBModal,MDBModalHeader,MDBModalBody,MDBInput,MDBModalFooter } from 'mdbreact';

export default class component extends Component {
    state = {
        modal: false
      }
      
      toggle = () => {
        this.setState({
          modal: !this.state.modal
        });
      }
  render() {
    return (
        <div>
            <h1>Quản Lý Kinh Doanh</h1>
            <table >
                <th><input class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Search"/></th>
                <th><button class="btn btn-outline-success my-2 my-sm-0" type="button">Tìm kiếm</button></th>
                
               
            </table>
            <table class="table table-striped">
                <thead>
                    <tr style={{textAlign:"center",fontWeight:"bold"}}>
                    <th scope="col">Chức Năng</th>
                    <th scope="col">Phân Hệ</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Thay giá cước</th>
                    <td>Khách Hàng</td>
                    <td>Hoạt động</td>
                    <td>
                        <button type="button" class="btn btn-info"><i class="fas fa-address-card"></i></button>
                        <button onClick={this.toggle}  type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-warning"><i class="fas fa-user-lock"></i></button>
                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    </tr>
                </tbody>
            </table>
            <MDBContainer>
          <MDBModal isOpen={this.state.modal} toggle={this.toggle}  
          size="sm"> 
            <MDBModalHeader toggle={this.toggle} className="primary-color"
            style={{color: "white"}} >          
              <b>Cập nhật cước phí</b>
            </MDBModalHeader>
            <MDBModalBody style={{fontFamily: "Verdana"}}>
              <MDBInput size="lg" icon="dollar-sign" label="Giá mở cửa" hint="" type="number"></MDBInput>
              <MDBInput size="lg"icon="dollar-sign" label="Giá mỗi km tiếp theo" hint="" type="number"></MDBInput>
            </MDBModalBody>
            <MDBModalFooter className="primary-color">
              <MDBBtn outline color="light">Hoàn tất</MDBBtn>
            </MDBModalFooter>
          </MDBModal>  
        </MDBContainer>    
        </div>
    );
  }
}
