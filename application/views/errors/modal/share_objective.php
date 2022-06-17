<?php echo form_open("operation/setSubObjective"); ?>
<div class="row">
     <div class="card col-md-12">
          <div class="card-body">
               <h4 class="header-title"><i class="fas fa-check-double"></i> &nbsp; Set Objective</h4>
               <div class="row">
                    <div class="col-12">
                         <div class="p-2">
                              <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Tahun<span class="text text-danger">*</span></label>
                                    <div class="col-sm-9">
                                         <input class="form-control" type="text" value="<?=$this->session->userdata("config")["tahun_active"]?>" readonly />
                                    </div>
                              </div>
                              <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Bulan<span class="text text-danger">*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" type="text" value="<?=$this->session->userdata("config")["bulan_active"] == "6" ? "Semester 1":"Semester 2"?>" readonly />
                                  </div>
                              </div>
                              <div class="mb-2 row">
                                    <label class="col-sm-3 control-label">Jabatan<span class="text text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="<?=$jabatan?>" readonly />
                                        <input class="form-control" type="hidden" name="jabatan_id" value="<?=$jabatan_id?>" readonly />
                                        <input class="form-control" type="hidden" name="jabatan_id_self" value="<?=$jabatan_id_self?>" readonly />
                                    </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="row">
     <div class="card col-md-12">
          <div class="card-body">
               <h4 class="header-title"><i class="fas fa-table"></i> &nbsp; Objective</h4>
               <div class="responsive-table-plugin">
                   <div class="table-wrapper">
                       <div class="table-responsive" data-pattern="priority-columns">
                           <table id="tech-companies-1-clone" class="table table-striped">
                               <thead>
                               <tr>
                                   <th>Check</th>
                                   <th>Objective</th>
                               </tr>
                               </thead>
                               <tbody id="objectivetable">
                               </tbody>
                           </table>
                       </div> <!-- end .table-responsive -->
                   </div></div> <!-- end .table-rep-plugin-->
               </div>
          </div>
 </div>
<div class="mb-2 row">
   <div class="col-12" align="center">
       <button class="btn btn-success btn" type="submit">Set Objective</button>
   </div>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
    function checkall(e){
      if($(e.target).prop('checked')){
        $(".chx").prop('checked',true);
      }else{
        $(".chx").prop('checked',false);
      }
    }
    function change_objective(){
      $("#objectivetable").html(`<tr><td colspan="2">-- Loading --</td></tr>`);
      ajax_secure_post("<?=base_url('api/setObjective_subchgobjective')?>",{jabatan_id_self:'<?=$jabatan_id_self?>',jabatan_id:'<?=$jabatan_id?>',unit_kerja_id:'<?=$this->session->userdata('unit_kerja_id')?>'},function(data){
        data = data.data;
        var inner = "";
        if(data.objective.length>0){
          inner += `<tr class="text-danger">
              <td><input type="checkbox" onchange="checkall(event)" value="0"></td>
              <td><i>&nbsp;Check All</i></td>
          </tr>`;
        }
        for(var x=0;x<data.objective.length;x++){
          var cek=0;
          for(var n=0;n<data.existing.length;n++){
            if(data.objective[x].rkf_id==data.existing[n].rkf_id){
              cek=1;
              inner += `<tr>
                  <td><input type="checkbox" class="chx" name="rkf_id[]" checked value="`+data.objective[x].rkf_id+`" /></td>
                  <td>`+data.objective[x].objective+`</td>
              </tr>`;
              break;
            }
          }
          if(cek==0){
            inner += `<tr>
                <td><input type="checkbox" class="chx" name="rkf_id[]" value="`+data.objective[x].rkf_id+`" /></td>
                <td>`+data.objective[x].objective+`</td>
            </tr>`;
          }
        }
        $("#objectivetable").html(inner);
      });
    }
    $(document).ready(function(){
      change_objective();
    });
</script>
