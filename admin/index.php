<? include('header.php'); ?>


<style>
    
        .tab {
            display: none;
        }

        .tab.active {
            display: block;
        }

        .tab-content {
            padding: 20px;
        }

        .tab-buttons {
            margin-bottom: 20px;
        }

        .tab-button {
            cursor: pointer;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .tab-button.active {
            background-color: #3498db;
            color: #fff;
        }
</style>
    <div class="main-panel">
        <div class="content-wrapper">
    
    
    <section class="card">
        <div class="card-body">
            
            <h2> Homepage | Exclusive Collection </h2>
            <hr />
            <div class="tab-buttons">
                <button class="tab-button active" onclick="openTab('apparel')">Apparel</button>
                <button class="tab-button" onclick="openTab('jewellery')">Jewellery</button>
            </div>

            <div id="apparel" class="tab active">
                <div class="tab-content">
                    <select id="garmentid" name="garmentid" class="form-control">
                        <option> Select </option>
                        <?
                        $garsql = mysqli_query($con,"SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");
                        while($garsql_result = mysqli_fetch_assoc($garsql)){
                            $name = $garsql_result['name'];
                            $garment_id = $garsql_result['garment_id'];    
                            echo '<option value="'.$garment_id.'">'.$name.'</option>' ;
                        }
                        ?>
                    </select>
                    <div id="garmentdestailsShow"></div>
                </div>
            </div>
            
            <div id="jewellery" class="tab">
                <div class="tab-content">
                   <select id="jewelid" name="jewelid" class="form-control">
                        <option> Select </option>
                        <?
                        $garsql = mysqli_query($con,"select * from subcat1");
                        while($garsql_result = mysqli_fetch_assoc($garsql)){
                            $name = $garsql_result['name'];
                            $subcat_id = $garsql_result['subcat_id'];    
                            echo '<option value="'.$subcat_id.'">'.$name.'</option>' ;
                        }
                        ?>
                    </select>
                    <div id="jewelDetailsShow"></div>
                    
                </div>
            </div>

            <script>
    function openTab(tabName) {

        var tabs = document.getElementsByClassName('tab');
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove('active');
        }

        var tabButtons = document.getElementsByClassName('tab-button');
        for (var i = 0; i < tabButtons.length; i++) {
            tabButtons[i].classList.remove('active');
        }


        document.getElementById(tabName).classList.add('active');

        var activeTabButton = document.querySelector('.tab-button[data-tab="' + tabName + '"]');
        activeTabButton.classList.add('active');
    }
</script>
        </div>
    </section>
    </div>
</div>
    
    
   

    
    
<script>
    $(document).on('change','#garmentid',function(){
                       $("#garmentdestailsShow").html('');

       var garmentid = $(this).val();
        $.ajax({
            url: "./garmentdestailsShow.php",
            data: 'garmentid='+garmentid,
            success: function(response) {
               $("#garmentdestailsShow").html(response);
            }
        });
    });
      $(document).on('change','#jewelid',function(){
         $("#jewelDetailsShow").html('');

       var jewelid = $(this).val();
        $.ajax({
            url: "./jeweldestailsShow.php",
            data: 'jewelid='+jewelid,
            success: function(response) {
               $("#jewelDetailsShow").html(response);
            }
        });
    });
</script>
    
<? include('footer.php'); ?>