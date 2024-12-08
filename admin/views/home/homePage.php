<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php require_once './views/layout/header.php' ?>
  <?php require_once './views/layout/nav.php' ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['ten_danh_muc', 'number_cate'],
        <?php
        foreach ($data1 as $key) {
          echo "['" . $key['ten_danh_muc'] . "' , " . $key['number_cate'] . "],";
        }
        ?>
      ]);

      var options = {
        title: 'Danh Muc Và Số Lượng Sản Phẩm Theo Danh Mục',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
    }
  </script>
  <div class=" card p-3 d-flex flex-row ">
    <div class="col-6">
      <h3>Thông Kê Số Lượng Sản Phẩm Theo Danh Mục</h3>
      <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
    <div class="col-2"></div>
    <div class="col-3 mt-5">
      <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-chart-bar fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2 text-dark">Tổng doanh thu</p>
          <h5 class="mb-0 " style="font-weight: 800;"><?= number_format($total) ?>VNĐ</h5>
        </div>
      </div>
      <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 mt-2">
      <a href="<?= BASE_URL_ADMIN . '?act=products' ?>"><i class="fas fa-box fa-3x text-primary"></i></a>
        <div class="ms-3">
          <p class="mb-2 text-dark">Số Sản Phẩm</p>
          <h5 class=" " style="font-weight: 800;"><?= $SoLuongSanPham ?> Sản Phẩm</h5>
        </div>
      </div>
      <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 mt-2">
      <a href="<?= BASE_URL_ADMIN . '?act=list_order' ?>" ><i class="fa fa-chart-pie fa-3x text-primary"></i></a>
        <div class="ms-3">
          <p class="mb-2 text-dark">Đơn Hàng Chưa Hoàn Tất</p>
          <h5 class="mb-0 " style="font-weight: 800;"><?= $soDonHang ?> Đơn Hàng</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="card p-3">
    <h1>Thống kê doanh thu</h1>

    <form method="GET" action="">
      <label>Từ ngày:</label>
      <input type="date" name="start_date" value="<?= htmlspecialchars($_GET['start_date'] ?? date('Y-m-01')) ?>">
      <label>Đến ngày:</label>
      <input type="date" name="end_date" value="<?= htmlspecialchars($_GET['end_date'] ?? date('Y-m-d')) ?>">
      <button type="submit">Lọc</button>
    </form>

    <canvas id="revenueChart"></canvas>
  </div>
  <script>
    const labels = <?= json_encode(array_column($data, 'date')) ?>;
    const data = <?= json_encode(array_column($data, 'revenue')) ?>;

    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: data,
          borderColor: 'rgba(54, 162, 235, 1)', // Màu đường nét
          backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền
          borderWidth: 3, // Độ dày của đường
          pointBackgroundColor: 'rgba(255, 99, 132, 1)', // Màu các điểm
          pointRadius: 5, // Kích thước điểm
          tension: 0.4, // Đường cong mềm mại
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top',
            labels: {
              color: 'rgba(75, 75, 75, 1)',
              font: {
                size: 14,
                weight: 'bold'
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                const value = context.raw.toLocaleString('vi-VN');
                return `Doanh thu: ${value} VNĐ`;
              }
            }
          }
        },
        scales: {
          x: {
            ticks: {
              color: 'rgba(75, 75, 75, 1)', // Màu nhãn trục X
              font: {
                size: 12
              }
            },
            grid: {
              display: false // Ẩn đường lưới dọc
            }
          },
          y: {
            beginAtZero: true,
            min: 0,
            max: 250000000,
            ticks: {
              color: 'rgba(75, 75, 75, 1)', // Màu nhãn trục Y
              font: {
                size: 12
              },
              callback: function(value) {
                return value.toLocaleString('vi-VN') + ' VNĐ';
              }
            },
            grid: {
              color: 'rgba(200, 200, 200, 0.3)', // Màu đường lưới ngang
              borderDash: [5, 5] // Kiểu đường lưới (nét đứt)
            }
          }
        }
      }
    });
  </script>


  <?php require_once './views/layout/footer.php' ?>
</body>

</html>