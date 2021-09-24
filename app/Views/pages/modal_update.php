<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pages/update/<?= esc($list['id'])?>" method="post" id="updatesmpform">
	  			<div class="row">
	  				<div class="col">
			  			<div class="form-group">
			  				<label for="">Наименование СМП</label>
					    	<input class="form-control" type="input" name="title" value="<?= esc($list['title'])?>">
						  </div>
					  </div>
					</div>
					<div class="row">
						<div class="col">
					    <div class="form-group">
					    	<label >Контролирующий орган</label>
					    	<select class="form-control authority" name="authority_id">
					    		<?php foreach ($auth_list as $item): ?>
					    			<option value="<?= esc($item['id']) ?>" <?= ($item['id'] == $list['authority_id']) ? 'selected' : '' ?>><?= esc($item['title']) ?></option>
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
								  <input type="text" class="form-control datepicker-here" autocomplete="off" data-date-format="dd/mm/yyyy" data-auto-close="true" placeholder="ДД/ММ/ГГГГ" name="date_from" value="<?= date("d/m/Y", strtotime(esc($list['date_from']))) ?>">
								  <input type="text" class="form-control datepicker-here" autocomplete="off" data-date-format="dd/mm/yyyy" data-auto-close="true" placeholder="ДД/ММ/ГГГГ" name="date_to" value="<?= date("d/m/Y", strtotime(esc($list['date_to']))) ?>">
								</div>
					    </div>
				    </div>
				    <div class="col">
					    <div class="form-group">
					    	<label for="organ">Плановая длительность проверки</label>
					    	<input class="form-control" type="number" min="0" name="duration" value="<?= esc($list['duration'])?>">
					    </div>
				    </div>
			    </div>
	  		</form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="updatesmpform" class="btn btn-primary">Сохранить изменения</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>