<?php
/**
 * CMB2 Pipes support functions
 */

if ( ! function_exists( 'cmb2_pipe' ) ) {
	function cmb2_pipe( $field_id, $direction, $target ) {
		return TAD_Pipe_Piper::pipe( $field_id, $direction, $target );
	}

}

if ( ! function_exists( 'cmb2_p2p_pipe' ) ) {
	function cmb2_p2p_pipe( $field_id, $direction, $p2p_type, $connection_direction = 'from' ) {
		return TAD_Pipe_Piper::pipe( $field_id, $direction, $p2p_type, 'P2P', array( 'connection_direction' => $connection_direction ) );
	}
}

/**
 * Checks if a string is a valid timestamp.
 *
 * https://gist.github.com/sepehr/6351385
 *
 * @param  string $timestamp Timestamp to validate.
 *
 * @return bool
 */
if ( ! function_exists( 'is_timestamp' ) ) {
	function is_timestamp( $timestamp ) {
		$check = ( is_int( $timestamp ) OR is_float( $timestamp ) ) ? $timestamp : (string) (int) $timestamp;

		return ( $check === $timestamp ) AND ( (int) $timestamp <= PHP_INT_MAX ) AND ( (int) $timestamp >= ~PHP_INT_MAX );
	}
}
