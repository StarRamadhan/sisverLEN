        <script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>plugins/jquery/jquery.js"></script>
        <script src="<?php echo base_url()?>plugins/chartjs/Chart.bundle.js"></script>
            <script src="<?php echo base_url()?>js/admin.js"></script>
        <!-- Basic Examples -->
        <div class="row clearfix">
          <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>ALL DOCUMENT IN</h2>
                  </div>
                  <div class="body">
                      <canvas id="chartDokMasuk" height="50"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>ALL DOCUMENT REJECTED</h2>
                  </div>
                  <div class="body">
                      <canvas id="chartDokReject" height="50"></canvas>
                  </div>
              </div>
          </div>
          <script>

            $(function () {
                new Chart(document.getElementById("chartDokMasuk").getContext("2d"), getChartJs('bar'));
                new Chart(document.getElementById("chartDokReject").getContext("2d"), getChartJs('line'));
            });

            function getChartJs(type) {
                var config = null;
                if (type === 'bar') {
                    config = {
                        type: 'bar',
                        data: {
                          labels:[
                          <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $now = date('m');
                            for ($i = 0; $i < $now; ++$i) {
                              $m = date("M", strtotime("January +$i months"));
                              echo '"'.$m.'",';
                            }
                            ?>],
                            datasets: [
                              {
                                label: "Dokumen Masuk",
                                data: [
                                  <?php
                                  date_default_timezone_set("Asia/Jakarta");
                                  $now = date('m');
                                  $dokBulan = [$dokJan,$dokFeb,$dokMar,$dokApr,$dokMei,$dokJun,$dokJul,$dokAgs,$dokSep,$dokOkt,$dokNov,$dokDes];
                                  for ($i=0; $i <= $now; $i++) {
                                    echo '"'.$dokBulan[$i].'",';
                                  }
                                ?>],
                                borderColor: 'rgba(0, 188, 212, 0.75)',
                                backgroundColor: 'rgba(0, 188, 212, 0.5)',
                                pointBorderColor: 'rgba(0, 188, 212, 0)',
                                pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                                pointBorderWidth: 1
                              }]
                        },
                        options: {
                            responsive: true,
                            legend: false
                        }
                    }
                }
                else if (type === 'line') {
                    config = {
                        type: 'line',
                        data: {
                            labels: [<?php
                              date_default_timezone_set("Asia/Jakarta");
                              $now = date('m');
                              for ($i = 0; $i < $now; ++$i) {
                                $m = date("M", strtotime("January +$i months"));
                                echo '"'.$m.'",';
                              }
                              ?>],
                            datasets: [{
                                label: "Dokumen Direject",
                                data: [<?php
                                  date_default_timezone_set("Asia/Jakarta");
                                  $now = date('m');
                                  $rejBulan = [$rejJan,$rejFeb,$rejMar,$rejApr,$rejMei,$rejJun,$rejJul,$rejAgs,$rejSep,$rejOkt,$rejNov,$rejDes];
                                  for ($i=0; $i <= $now; $i++) {
                                    echo '"'.$rejBulan[$i].'",';
                                  }
                                ?>],
                                backgroundColor: 'rgba(255, 30, 0, 0.4)'
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: false
                        }
                    }
                }
                return config;
            }

          </script>
