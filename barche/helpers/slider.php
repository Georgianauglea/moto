<div class="slider-wrapper">
    <div class="slider">
        <div class="slider-inner">
            <div class="row">
                <div class="images span9">
                    <div class='iosSlider'>
                        <div class='slider-content'>

                            <?php
                            // prelievo tutti gli annunci
                            $sql1 = 'SELECT * FROM `annunci` LIMIT 3';
                            $risultato1 = mysqli_query($con, $sql1);

                            //CONTROLLO ERRORI QUERY
                            if (!$risultato1)
                                die("Errore estrazione Annunci" . mysql_error());

                            while ($riga1 = mysqli_fetch_array($risultato1)) {
                                $id = $riga1[0];
                                ?>  

                                <div class="slide">
                                    <img src="/uploads/<?php echo getIdUtente($id); ?>/<?php echo $id; ?>/foto-large-1.jpg" alt="">

                                    <div class="slider-info">
                                        <div class="price">
                                            <h2><?php echo getPrezzo($id); ?>€</h2>
                                            <a href="detail.php?id=<?php echo $id; ?>">Dettagli</a>
                                        </div><!-- /.price -->
                                        <h2><a href="detail.php?id=<?php echo $id; ?>"><?php echo getNomeBarca($id); ?></a></h2>                                       
                                    </div><!-- /.slider-info -->
                                </div><!-- /.slide -->

                                <?php
                            }
                            ?>




                        </div><!-- /.slider-content -->
                    </div><!-- .iosSlider -->

                    <ul class="navigation">
                        <li class="active"><a>1</a></li>
                        <li><a>2</a></li>
                        <li><a>3</a></li>
                    </ul><!-- /.navigation-->
                </div><!-- /.images -->
                <div class="span3">
                    <div class="property-filter">
                        <div class="content">
                            <form name="fform" id="fform" method="post" action="fetchSearch.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Nuovo/Usato
                                    </label>
                                    <div class="controls">
                                        <select id="nuovo" name="nuovo">
                                            <option value="0">Tutti</option>
                                            <option value="1">Nuovo</option>
                                            <option value="2">Usato</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="inputType">
                                        Vela/Motore
                                    </label>
                                    <div class="controls">
                                        <select id="power" name="power">
                                            <option value="0">Tutti</option>
                                            <option value="1">Motore</option>
                                            <option value="2">Vela</option>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->   
                                
                                <div class="beds control-group">
                                    <label class="control-label" for="inputBeds">
                                        Anno
                                    </label>
                                    <div class="controls">
                                       <input type="text" name="annoMin" id="annoMin" placeholder="Da"> 
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="baths control-group">
                                    <label class="control-label" for="inputBaths">
                                        <br>
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="annoMax" id="annoMax" placeholder="a"> 
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->   

                                

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        Price from
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="prezzoMin" id="prezzoMin">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                        Price to
                                    </label>
                                    <div class="controls">
                                        <input type="text" name="prezzoMax" id="prezzoMax">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-value">
                                    <span class="from"></span><!-- /.from -->
                                    -
                                    <span class="to"></span><!-- /.to -->
                                </div><!-- /.price-value -->

                                <div class="price-slider">
                                </div><!-- /.price-slider -->

                                <div class="form-actions">
                                    <input type="submit" value="Cerca" class="btn btn-primary btn-large">
                                </div><!-- /.form-actions -->
                                
                                <label class="control-label" for="inputLocation" style="margin-top: 11px;">
                                    <a href="ricerca.php" style="color:#fff">Ricerca Avanzata</a>
                                </label>
                            </form>
                            
                        </div><!-- /.content -->
                    </div><!-- /.property-filter -->

                </div><!-- /.span3 -->
            </div><!-- /.row -->
        </div><!-- /.slider-inner -->
    </div><!-- /.slider -->
</div><!-- /.slider-wrapper -->
