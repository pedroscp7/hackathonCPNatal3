<div class="box">
  <div class="box-header with-border">
    <h2>Litologia: <small>Prototipação de solo</small></h2>
  </div>

  <div class="box-body">

    <div class="x_panel">

      <div class="x_content">

        <div class="col-md-6">
          <form method="POST" class="my-form" action="<?php echo base_url() ?>litologia/create">

            <input type="hidden" name="litologia" value="<?php echo $litologia ?>">

            <!--  -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Início*</label>
                <div>
                  <input class="form-control" required type="number" min="<?php echo $minimo ?>" max="<?php echo $minimo ?>" name="inicio" value="">
                </div>
              </div>
            </div>

            <!--  -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Fim*</label>
                <div>
                  <input class="form-control" required type="number" min="<?php echo $minimo ?>" name="fim" value="">
                </div>
              </div>
            </div>

            <!--  -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Tipo de Solo*</label>
                <div>
                  <select class="form-control" name="solo" required>
                    <option value="">Selecione o tipo de solo</option>
                    <option value="1">Arenito Calcifero</option>
                    <option value="2">Arenito Fino</option>
                    <option value="3">Arenito Grosso</option>
                    <option value="4">Argilito Medio</option>
                    <option value="5">Argilito Arenoso</option>
                    <option value="6">Argilito Fino a Medio</option>
                    <option value="7">Argilito Medio a Grosso</option>
                    <option value="8">Argilito</option>
                    <option value="9">Cimento</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-12" align="right">
              <a type="button" class="btn btn-default" href="javascript: printDivImpressao();">Gerar PDF</a>
              <button type="submit" class="btn btn-primary">Inserir Solo</button>
            </div>
          </form>
        </div>

        <div class="col-md-6">

          <?php

          print_r($soloNormal);

          ?>

        </div>

        <div style="display: none;" id="printImpressao">

          <?php

          print_r($soloAmpliado);

          ?>

        </div>
        <!-- <img src="<?php echo base_url() ?>assets/imagens/1.jpg" height="100px" width="300px">
        <img src="<?php echo base_url() ?>assets/imagens/2.jpg" height="50px" width="300px">
        <img src="<?php echo base_url() ?>assets/imagens/3.jpg" height="90px" width="300px"> -->
      </div>
    </div>
  </div>

</div>

<div class="clearfix"></div>

<script type="text/javascript">

  function printDivImpressao() {


    $.ajax({
      url: '<?php echo base_url() ?>litologia/finish',
      type: "POST",
      dataType: "HTML",
      data: {
        'litologia': <?php echo $litologia ?>,
        'status': 1
      },
      success: function (data) {
        var conteudo = document.getElementById("printImpressao").innerHTML;
        tela_impressao = window.open();
        tela_impressao.document.write('<div style="width: 1000px; margin-left: 0;">' + conteudo  + '</div>');
        tela_impressao.window.print();
        tela_impressao.window.close();
        window.location.reload();
      }
    });

  }

</script>