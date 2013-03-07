<?php
include 'dna.php';
include 'rna.php';

if ($_POST)
{
    if($_POST['type'] == "dna")
    {
        $dna = new Dna();
        $protein = $dna->search($_POST);
    }
    else if($_POST['type'] == "rna")
    {
        $rna = new Rna();
        $protein = $rna->search($_POST);
    }
    
}
?>
<html>
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
        <script type="text/javascript" src="jquery.js"></script> 
        <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
        <script type="text/javascript" src="jquery.easytabs.js"></script>
        <script type="text/javascript" src="jquery.hashchange.min.js"></script> 
        <script type="text/javascript" src="script.js"></script> 
        <title>DNA</title>
    </head>
    <body>
        <h1>Trabalho Final de Bioinfo</h1>
        <div id="tab-container" class="tab-container">
            <ul class='etabs'>
                <li class='tab'><a href="#contentDnaProtein">DNA -> PROTEÍNA</a></li>
                <li class='tab'><a href="#contentProteinDna">RNA -> PROTEÍNA</a></li>
            </ul>
            <div class="panel-container">
                <div id='contentDnaProtein'>
                    <h2>DNA -> PROTEÍNA</h2>
                    <form id="form" name="form" action="index.php" method="post" >
                        <label>  Enter DNA Sequence: </label><br />
                        <textarea  rows="4" cols="64" id="sequence" name="sequence"/><?php if(isset($_POST['sequence'])) echo $_POST['sequence']?></textarea><br />
                         <input type="hidden" name="type" value="dna" />
                        <input type="submit" value="Search" />
                    </form>
                    <h3>Proteína</h3>
                    <?php
                    if(isset($protein))
                    {
                        if(is_array($protein))
                        {
                            ?>
                            <div class="protein">
                            <?php
                            foreach ($protein as $key => $value) {
                                ?>
                                <div class='sigleProtein'>
                                <?php
                                foreach ($value as $code => $name) {
                                ?>
                                    <div class='tooltip' title='<img src="./imagens/<?php echo $code;?>.gif"> <?php echo $name;?>'>
                                        <p><?php echo $code;?></p>

                                    </div>
                                <?php
                                }
                                ?>
                                </div>
                                <?php
                            }?>
                            <div class="clear"></div>
                            </div>
                        <?php  
                        }            
                        else{
                        ?>
                            <div class='erro'><?php echo $protein;?></div>
                        <?php
                        }
                    }
                    ?>
                </div>
                <div id='contentProteinDna'>
                    <h2>RNA -> PROTEÍNA</h2>
                    <form id="form" name="form" action="index.php#contentProteinDna" method="post" >
                        <label>  Enter RNA Sequence: </label><br />
                        <textarea  rows="4" cols="64" id="sequence" name="sequence"/><?php if(isset($_POST['sequence'])) echo $_POST['sequence']?></textarea><br />
                        <input type="hidden" name="type" value="rna" />
                        <input type="submit" value="Search" />
                    </form>
                    <h3>Proteína</h3>
                    <?php
                    if(isset($protein))
                    {
                        if(is_array($protein))
                        {
                            ?>
                            <div class="protein">
                            <?php
                            foreach ($protein as $key => $value) {
                                ?>
                                <div class='sigleProtein'>
                                <?php
                                foreach ($value as $code => $name) {
                                ?>
                                    <div class='tooltip' title='<img src="./imagens/<?php echo $code;?>.gif"> <?php echo $name;?>'><p><?php echo $code;?></p></div>
                                <?php
                                }
                                ?>
                                </div>
                                <?php
                            }?>
                            <div class="clear"></div>
                            </div>
                        <?php  
                        }            
                        else{
                        ?>
                            <div class='erro'><?php echo $protein;?></div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="footer">
                <p>Guilherme Fabiano Alves da Silva</p>
                <p>Leandro Pereira Rola Belas</p>
                <p>DCC - IM - UFRJ</p>
            </div>
        </div>
    </body>
</html>
