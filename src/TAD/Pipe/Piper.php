<?php


class TAD_Pipe_Piper {

	public static function pipe( $field_id, $direction, $target, $type = null, array $args = null ) {
		if ( empty( $type ) ) {
			$pipe = TAD_Pipe_PipeFactory::make( $target );
		} else {
			$pipe = TAD_Pipe_PipeFactory::make( $type );
		}

		if ( ! $pipe ) {
			return $field_id;
		}

		$pipe->set_field_id( $field_id );
		$pipe->set_direction( $direction );
		$pipe->set_target( $target );

		if ( ! empty( $args ) ) {
			foreach ( $args as $key => $value ) {
				$pipe->set( $key, $value );
			}
		}

		self::hooks( $field_id, $pipe );

		return $field_id;
	}


	private static function hooks( $field_id, TAD_Pipe_PipeInterface $pipe ) {
		add_filter( "cmb2_override_{$field_id}_meta_save", array( $pipe, 'save' ), 10, 4 );
		add_filter( "cmb2_override_{$field_id}_meta_value", array( $pipe, 'value' ), 10, 4 );
		add_filter( "cmb2_override_{$field_id}_meta_remove", array( $pipe, 'remove' ), 10, 4 );
	}

	/**
	 * @return array
	 */
	public static function get_legit_pipe_targets() {
		$legit_targets = array(
			'post_author'           => 'post',
			'post_date'             => 'post',
			'post_date_gmt'         => 'post',
			'post_content'          => 'post',
			'post_title'            => 'post',
			'post_excerpt'          => 'post',
			'post_status'           => 'post',
			'comment_status'        => 'post',
			'ping_status'           => 'post',
			'post_password'         => 'post',
			'post_name'             => 'post',
			'to_ping'               => 'post',
			'pinged'                => 'post',
			'post_modified'         => 'post',
			'post_modified_gmt'     => 'post',
			'post_content_filtered' => 'post',
			'post_parent'           => 'post',
			'guid'                  => 'post',
			'menu_order'            => 'post',
			'post_type'             => 'post',
			'post_mime_type'        => 'post',
			'comment_count'         => 'post',
			'p2p'                   => 'P2P'
		);

		return $legit_targets;
	}
}
