<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавление</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pages/create" method="post" id="smpform">
	  			<div class="row">
	  				<div class="col">
			  			<div class="form-group">
			  				<label for="">Наименование СМП</label>
					    	<input class="form-control" type="input" name="title">
						  </div>
					  </div>
					</div>
					<div class="row">
						<div class="col">
					    <div class="form-group">
					    	<label >Контролирующий орган</label>
					    	<select class="form-control authority" name="authority">
					    		<?php foreach ($auth_list as $item): ?>
					    			<option value="<?= esc($item['id']) ?>"><?= esc($item['title']) ?></option>
					    		<?php endforeach; ?>
					    	</select>
					    </div>
				    </div>
			    </div>
			    <div class="row">						
				    <div class="col">
					    <div class="form-group">
						    <label for="period">Период</label>
						    <div class="input-group">
								  <input type="text" class="form-control datepicker-here" autocomplete="off" data-date-format="dd/mm/yyyy" data-auto-close="true" placeholder="ДД/ММ/ГГГГ" name="date_from">
								  <input type="text" class="form-control datepicker-here" autocomplete="off" data-date-format="dd/mm/yyyy" data-auto-close="true" placeholder="ДД/ММ/ГГГГ" name="date_to">
								</div>
					    </div>
				    </div>
				    <div class="col">
					    <div class="form-group">
					    	<label for="organ">Плановая длительность проверки</label>
					    	<input class="form-control" type="number" min="0" name="duration">
					    </div>
				    </div>
			    </div>
	  		</form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="smpform" class="btn btn-primary">Сохранить изменения</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>