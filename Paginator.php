<?php

class Paginator {

    private $limit;
    private $results;
    private $page;
    private $total;

    function __construct($results)
    {
        $this->results = $results;
        $this->total = count($results);
    }

    public function getData( $limit = 10, $page = 1 ) {

        $this->limit   = $limit;
        $this->page    = $page;

        if ( $this->limit == 'all' ) {
            $paginatedResults = $this->results;
        } else {
            $paginatedResults = array_slice($this->results, ($this->page - 1) * $this->limit, $this->limit);
        }

        $result         = new stdClass();
        $result->page   = $this->page;
        $result->limit  = $this->limit;
        $result->total  = $this->total;
        $result->data   = $paginatedResults;

        return $result;
    }

    public function createLinks( $links, $list_class )
    {
        if ($this->limit == 'all') {
            return '';
        }

        $last = ceil($this->total / $this->limit);

        $start = (($this->page - $links) > 0) ? $this->page - $links : 1;
        $end = (($this->page + $links) < $last) ? $this->page + $links : $last;

        $html = '<ul class="' . $list_class . '">';

        $class = ($this->page == 1) ? "disabled" : "";

        if ($start > 1) {
            $html .= '<li><a href="?limit=' . $this->limit . '&position=1">1</a></li>';
            $html .= '<li class="disabled"><span>...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            $class = ($this->page == $i) ? "active" : "";
            $html .= '<li class="' . $class . '"><a href="?limit=' . $this->limit . '&position=' . $i . '">' . $i . '</a></li>';
        }

        if ($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= '<li><a href="?limit=' . $this->limit . '&position=' . $last . '">' . $last . '</a></li>';
        }

        $class = ($this->page == $last) ? "disabled" : "";

        if($end == 1 && $last == 1)
            return "";

        $html .= '</ul>';

        return $html;
    }

}