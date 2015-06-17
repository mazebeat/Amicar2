<?php

/**
 *
 * @author Maze
 */
class Texto
{

	/**
	 * URL`s
	 */
	public static $AMICAR_URL = "http://www.amicar.cl";

	/**
	 * Parametros URL
	 */
	public static $COTIZACION = "cotizacion";
	public static $CLIENTE    = "cliente";
	public static $EJECUTIVO  = "ejecutivo";
	public static $LLAVE      = "amicarCotizante";

	/**
	 * MCrypt params Encrypt/Decrypt
	 */
	public static $KEY = "amicarCotizantes";
	public static $IV  = "a1m2i3c4a5r6C7o8";

	/**
	 * Llave archivo ejecutivo
	 */
	public static $LLAVE_INICIO = "001";

	/**
	 * Logger
	 */
	public static $LOG_PROPERTIES_FILE = "log4j.properties";

	/**
	 * Text encode
	 */
	public static $ISO_8859_1 = "ISO-8859-1";
	public static $US_ASCII   = "US-ASCII";
	public static $UTF_16     = "UTF-16";
	public static $UTF_16BE   = "UTF-16BE";
	public static $UTF_16LE   = "UTF-16LE";
	public static $UTF_8      = "UTF-8";
	public static $DESINS_KEY = "removeSends";
}