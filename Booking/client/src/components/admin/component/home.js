import React, { Component } from 'react';
import {  MDBContainer, MDBCard, MDBCardBody, MDBCol, MDBRow, MDBListGroup, MDBListGroupItem}  from "mdbreact";
import {Bar} from "react-chartjs-2";

class App extends Component {
  state = {
    doanhso: {
      labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
      datasets: [
        // DOANH SỐ
        {
          label: "DOANH THU (VNĐ)",
          data: [100000000, 30000000, 50000000, 70000000, 120000000, 50000000,
                10000000, 20000000, 35000000, 45000000, 150000000, 70000000],
          backgroundColor: "Lime",
          borderWidth: 2,
          borderColor: "lightGreen"
        }
      ]
    },
    songuoi: {
      labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
      datasets: [
        // KHÁCH HÀNG
        {
          label: "KHÁCH HÀNG",
          data: [300, 200, 150, 45, 37, 49,
                100, 250, 320, 700, 1000, 900],
          backgroundColor: "blue",
          borderWidth: 2,
          borderColor: "lightBlue"
        },

        // TÀI XẾ
        {
          label: "TÀI XẾ",
          data: [30, 20, 150, 95, 20, 59,
                 700, 23, 320, 300, 400, 420],
          backgroundColor: "red",
          borderWidth: 2,
          borderColor: "pink"
        }
      ]
    },
    barChartOptions: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        xAxes: [
          {
            barPercentage: 1,
            gridLines: {
              display: false,
              color: "rgba(0, 0, 0, 0.1)"
            }
          }
        ],
        yAxes: [
          {
            gridLines: {
              display: true,
              color: "rgba(0, 0, 0, 0.1)"
            },
            ticks: {              
              beginAtZero: true
            }
          }
        ]
      }
    }
  }


  render() {
    return (
      <MDBContainer>
      <MDBRow>
        <MDBCol size="3"></MDBCol>
        <MDBCol size="9">
          <MDBRow style={{height: ""}}>
            <MDBCol>
              <MDBContainer>
              <h4 className="mt-5 green-text">Doanh số</h4>
              <Bar data={this.state.doanhso} options={this.state.barChartOptions} />
              </MDBContainer>
            </MDBCol>
            <MDBCol>
              <MDBContainer>
              <h4 className="mt-5">Số lượng khách hàng và tài xế</h4>
              <Bar data={this.state.songuoi} options={this.state.barChartOptions} 
              />
              </MDBContainer></MDBCol>
          </MDBRow>
          <MDBRow>
            <MDBCol>
              <MDBContainer>
              <MDBCard color="success-color">
                <MDBCardBody>
                  <MDBListGroup>
                    <MDBListGroupItem>Tổng doanh thu :
                      <b>1,000,000,000 VNĐ</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Tháng có doanh thu cao nhất :
                      <br></br>
                      <b>Tháng </b> <b>11</b> <b> - </b> <b>150,000,000 VNĐ</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Tháng có doanh thu thấp nhất :
                      <br></br>
                      <b>Tháng </b> <b>7</b> <b> - </b> <b>10,000,000 VNĐ</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Doanh thu bình quân :
                      <b>100,000,000 VNĐ</b>
                    </MDBListGroupItem>
                  </MDBListGroup>
                </MDBCardBody>
              </MDBCard>
              </MDBContainer>            
            </MDBCol>
          </MDBRow>

          <MDBRow>
            <MDBCol >
            <MDBContainer>
              <MDBCard color="primary-color">
                <MDBCardBody>
                  <MDBListGroup>
                    <MDBListGroupItem>Tổng số khách hàng :
                      <b>1,000</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Tháng có số lượt khách cao nhât :
                      <br></br>
                      <b>Tháng </b> <b>11</b> <b> - </b> <b>1000</b> <b> người</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Tháng có doanh thu thấp nhất :
                      <br></br>
                      <b>Tháng </b> <b>5</b> <b> - </b> <b>37</b> <b> người</b>
                    </MDBListGroupItem>
                  </MDBListGroup>
                </MDBCardBody>
              </MDBCard>
              </MDBContainer>
            </MDBCol>

            <MDBCol >
              <MDBContainer >
              <MDBCard color="danger-color">
                <MDBCardBody>
                  <MDBListGroup>
                    <MDBListGroupItem>Tổng số tài xế :
                      <b>1000</b> <b> người</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Tháng có số tài xế cao nhất :
                      <br></br>
                      <b>Tháng </b> <b>7</b> <b> - </b> <b>700</b> <b> người</b>
                    </MDBListGroupItem>
                    <MDBListGroupItem>Tháng có số tài xế thấp nhất :
                      <br></br>
                      <b>Tháng </b> <b>8</b> <b> - </b> <b>23</b> <b> người</b>
                    </MDBListGroupItem>
                  </MDBListGroup>
                </MDBCardBody>
              </MDBCard>
              </MDBContainer>
            </MDBCol>
          </MDBRow>
        </MDBCol>
      </MDBRow>  
      </MDBContainer>
    );
  }
}

export default App;
