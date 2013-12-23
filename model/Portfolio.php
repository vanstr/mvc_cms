<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 22:16
 */

class Portfolio extends Model {

    public $tplName = 'portfolio/portfolio';

    public function __construct() {
        d_Echo("Model class constructed : " . get_class($this));
    }

    public function render() {


        // add header scripts
        $this->tpl->assign("modelHeader", $this->getModelHeaderHTML());

        $this->tpl->assign("portfolioHeader", $this->getTextByName("portfolioHeader"));

        if (isset($_GET['id']) && $_GET['id'] != '') {

            $sql = "SELECT * FROM portfolio WHERE id = '".(int)$_GET['id']."'";
            $query = $this->db->query($sql);
            $portfolioItem = $query->row;
            if($portfolioItem == null) return; // TODO
            //d_echo($portfolioItem);
            $this->tpl->assign("portfolioItem", $portfolioItem);

            $modelHTML = $this->tpl->draw('portfolio/portfolioItem', $return_string = true);
        } else {
            // render portfolio Types
            $sql = "SELECT type FROM portfolio GROUP BY type";
            $query = $this->db->query($sql);
            $portfolioTypes = $query->rows;
            //d_echo($portfolioTypes);
            $this->tpl->assign("portfolioTypes", $portfolioTypes);

            // render portfolio Items
            $sql = "SELECT * FROM portfolio";
            $query = $this->db->query($sql);
            $portfolioItems = $query->rows;
            //d_echo($portfolioItems);
            $this->tpl->assign("portfolioItems", $portfolioItems);

            // add footer scripts
            $modelFooter = $this->tpl->draw('portfolio/portfolioFooter', $return_string = true);
            $this->tpl->assign("modelFooter", $modelFooter);

            $modelHTML = $this->tpl->draw($this->tplName, $return_string = true);
        }
        return $modelHTML;
    }

    public function getModelHeaderHTML() {
        return '<link rel="stylesheet" type="text/css" href="' . DIR_WEB_VIEW . 'css/portfolio.css" />
    <link rel="stylesheet" type="text/css" href="' . DIR_WEB_VIEW . 'css/lib/isotope.css" />';
    }

} 