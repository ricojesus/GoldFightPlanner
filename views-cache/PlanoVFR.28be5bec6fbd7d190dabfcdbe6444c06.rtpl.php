<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">

    <div class="col-md-12">
      <form class="form-horizontal" role="form" action="/GoldFlightPlanner/vfr" method="post">
     
        <div class="box box-info">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#geral">Dados Gerais</a></li>
              <li><a data-toggle="tab" href="#aeronave">Aeronave</a></li>
              <li><a data-toggle="tab" href="#rota">Rota</a></li>
              <li><a data-toggle="tab" href="#menu2">Dados Complementares</a></li>
            </ul>

          <div class="box-body">
            <!-- Tab Content-->
            <div class="tab-content">

              <div id="geral" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-12">

                    <!-- Formulário com Dados Basico -->
                    <div class="form-group">
                      <label for="Origem" class="col-sm-1 control-label">Callsign</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control form-control-sm" name="CallSign" id="CallSign" placeholder="CallSign" value="<?php echo htmlspecialchars( $Piloto["CallSign"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                      </div>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="NomePiloto" id="NomePiloto" placeholder="Nome do Piloto" value="<?php echo htmlspecialchars( $Piloto["Name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Origem" class="col-sm-1 control-label">Origem</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="Origem" id="Origem" placeholder="Origem" value="<?php echo htmlspecialchars( $Origem["Icao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                      </div>
                 
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NomeOrigem" id="NomeOrigem" placeholder="Nome do Aeroporto" value="<?php echo htmlspecialchars( $Origem["Nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>

                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="MetarOrigem" id="MetarOrigem" placeholder="Metar" value="<?php echo htmlspecialchars( $Origem["Metar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Destino" class="col-sm-1 control-label">Destino</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="Destino" id="Destino" placeholder="Destino" value="<?php echo htmlspecialchars( $Destino["Icao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NomeDestino" id="NomeDestino" placeholder="Nome do Aeroporto" value="<?php echo htmlspecialchars( $Destino["Nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>

                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="MetarDestino" id="MetarDestino" placeholder="Metar" value="<?php echo htmlspecialchars( $Destino["Metar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Alternativo" class="col-sm-1 control-label">Alternativo</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="Alternativo" id="Alternativo" placeholder="Alternativo" value="<?php echo htmlspecialchars( $Alternativo["Icao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NomeAlternativo" id="NomeAlternativo" placeholder="Nome do Aeroporto" value="<?php echo htmlspecialchars( $Alternativo["Nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>

                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="MetarAlternativo" id="MetarAlternativo" placeholder="Metar" value="<?php echo htmlspecialchars( $Alternativo["Metar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                      </div>
                    </div>

                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Localizar</button>
                  </div>

                </div>
                <!-- Formulário com Dados Basico -->

              </div>

              <div id="aeronave" class="tab-pane fade">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="Aeronave" class="col-sm-2 control-label">Aeronave</label>

                        <div class="col-sm-4" class="selectpicker">
                          <select name="Aeronaves" class="form-control">
                            <option>C172</option>
                            <option>B733</option>
                          </select>
                        </div>                     
                      </div>

                      <div class="form-group">
                        <label for="Aeronave" class="col-sm-2 control-label">Consumo</label>

                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="Consumo" id="Consumo" placeholder="Consumo" value="" readonly>
                        </div>                     
                      </div>

                      <div class="form-group">
                        <label for="Capacidade" class="col-sm-2 control-label">Capacidade</label>

                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="Capacidade" id="Origem" placeholder="Capacidade" value="" readonly>
                        </div>                     
                      </div>

                    </div>
                </div>
              </div>
              <div id="rota" class="tab-pane fade">
                <div class="row">
                  <div class="col-md-12">
                      <table class="table table-hover">
                        <tr>
                          <th>Origem</th>
                          <th>Trecho</th>
                          <th>Distância (NM)</th>
                          <th>Rumo Magnetico</th>
                          <th>Velocidade</th>
                          <th>Regra do PI</th>
                          <th>Altitude</th>
                          <th>VA</th>
                          <th>Vento (Direção)</th>
                          <th>VA (Velocidade)</th>
                          <th>VS</th>
                          <th>Duração Trecho</th>
                          <th>ETA</th>
                          <th>Combustível</th>
                        </tr>
                        <tr>
                          <td>SWBC</td>
                          <td>0110S06219W</td>
                          <td>37.2</td>
                          <td>122</td>
                          <td>110</td>
                          <td>Impar</td>
                          <td>A015</td>
                          <td>113</td>
                          <td>265</td>
                          <td>050</td>
                          <td>113</td>
                          <td>0:19:42</td>
                          <td>20:30:45</td>
                          <td>28.0</td>
                        </tr>
                        <tr>
                          <td>0110S06219W</td>
                          <td>0110S06337W</td>
                          <td>32.2</td>
                          <td>122</td>
                          <td>110</td>
                          <td>Impar</td>
                          <td>A015</td>
                          <td>113</td>
                          <td>265</td>
                          <td>050</td>
                          <td>113</td>
                          <td>0:10:42</td>
                          <td>20:44:45</td>
                          <td>20.0</td>
                        </tr>
                      </table>
                  </div>
                </div>

              </div>
              <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
              </div>
            </div>
            <!-- Tab Content-->

          </div>

        </div>
        
          <!-- /.box-footer -->
        </form>

      </div> <!-- Div Principal -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->