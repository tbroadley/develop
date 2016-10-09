<?php namespace ZN\ViewObjects;

interface InternalPaginationPropertiesInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // URL
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //
    //--------------------------------------------------------------------------------------------------------
    public function url(string $url) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Start
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $start
    //
    //--------------------------------------------------------------------------------------------------------
    public function start( ? int $start) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Limit
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $limit
    //
    //--------------------------------------------------------------------------------------------------------
    public function limit(int $limit) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Type
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type: ajax, classic
    //
    //--------------------------------------------------------------------------------------------------------
    public function type(string $type) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Total Rows
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $totalRows
    //
    //--------------------------------------------------------------------------------------------------------
    public function totalRows(int $totalRows) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Count Links
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $countLinks
    //
    //--------------------------------------------------------------------------------------------------------
    public function countLinks(int $countLinks) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Link Names
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $prev
    // @param string $next
    // @param string $first
    // @param string $last
    //
    //--------------------------------------------------------------------------------------------------------
    public function linkNames(string $prev, string $next, string $first, string $last) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Css
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $css
    //
    //--------------------------------------------------------------------------------------------------------
    public function css(array $css) : InternalPagination;

    //--------------------------------------------------------------------------------------------------------
    // Style
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $css
    //
    //--------------------------------------------------------------------------------------------------------
    public function style(array $style) : InternalPagination;
}
