<?php
// auto-generated by sfPropelAdmin
// date: 2007/08/06 12:32:12
?>
<?php echo form_tag('relAnioActividad/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($rel_anio_actividad, 'getId') ?>
<?php echo object_input_hidden_tag($rel_anio_actividad, 'getHoras') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('rel_anio_actividad[fk_anio_id]', __($labels['rel_anio_actividad{fk_anio_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('rel_anio_actividad{fk_anio_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rel_anio_actividad{fk_anio_id}')): ?>
    <?php echo form_error('rel_anio_actividad{fk_anio_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($rel_anio_actividad, 'getFkAnioId', array (
  'related_class' => 'Anio',
  'control_name' => 'rel_anio_actividad[fk_anio_id]',
  'include_custom' => '>>Seleccione un A&ntilde;o<<',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('rel_anio_actividad[fk_actividad_id]', __($labels['rel_anio_actividad{fk_actividad_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('rel_anio_actividad{fk_actividad_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rel_anio_actividad{fk_actividad_id}')): ?>
    <?php echo form_error('rel_anio_actividad{fk_actividad_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($rel_anio_actividad, 'getFkActividadId', array (
  'related_class' => 'Actividad',
  'control_name' => 'rel_anio_actividad[fk_actividad_id]',
  'include_custom' => '>>Seleccione una Actividad<<',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('rel_anio_actividad[fk_orientacion_id]', __($labels['rel_anio_actividad{fk_orientacion_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('rel_anio_actividad{fk_orientacion_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rel_anio_actividad{fk_orientacion_id}')): ?>
    <?php echo form_error('rel_anio_actividad{fk_orientacion_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($rel_anio_actividad, 'getFkOrientacionId', array (
  'related_class' => 'Orientacion',
  'control_name' => 'rel_anio_actividad[fk_orientacion_id]',
  'include_custom' => '>>Seleccione una Orientacion<<',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
  <?php echo label_for('rel_anio_actividad[horas]', __($labels['rel_anio_actividad{horas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('rel_anio_actividad{horas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('rel_anio_actividad{horas}')): ?>
    <?php echo form_error('rel_anio_actividad{horas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($rel_anio_actividad, 'getHoras', array (
    'size' => 16,
      'control_name' => 'rel_anio_actividad[horas]',
      )); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>



</fieldset>

<?php include_partial('edit_actions', array('rel_anio_actividad' => $rel_anio_actividad)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($rel_anio_actividad->getId() && $rel_anio_actividad->getHoras()): ?>
<?php echo button_to(__('delete'), 'relAnioActividad/delete?id='.$rel_anio_actividad->getId().'&horas='.$rel_anio_actividad->getHoras(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>