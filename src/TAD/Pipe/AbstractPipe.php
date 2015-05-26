<?php


class TAD_Pipe_AbstractPipe implements TAD_Pipe_SettablePropertiesInterface {

	/**
	 * @var string
	 */
	protected $field_id;

	/**
	 * @var string
	 */
	protected $direction;

	/**
	 * @var string
	 */
	protected $target;

	public function set_field_id( $field_id ) {
		Arg::_( $field_id, 'Field ID' )->is_string();
		$this->field_id = $field_id;
	}

	public function set_direction( $direction ) {
		$this->direction = $direction;
	}

	public function set_target( $target ) {
		$legit_targets = TAD_Pipe_Piper::get_legit_pipe_targets();
		Arg::_( $target, 'Pipe target' )->is_string();
		$this->target = $target;
	}

	public function set( $property, $value ) {
		$this->{$property} = $value;
	}
}