<?php
/**
 * Created by PhpStorm.
 * User: vanstr
 * Date: 13.12.12
 * Time: 22:16
 */

class Portfolio extends Model {

    public $tplName = 'portfolio/portfolio';

    public function render() {


        // add header scripts
        $this->registry->tpl->assign("modelHeader", $this->getModelHeaderHTML());

        $this->registry->tpl->assign("portfolioHeader", $this->getTextByName("portfolioHeader"));

        if (isset($_GET['id']) && $_GET['id'] != '') {

            $sql = "SELECT * FROM portfolio WHERE id = '".(int)$_GET['id']."'";
            $query = $this->registry->db->query($sql);
            $portfolioItem = $query->row;
            if($portfolioItem == null) return ""; // TODO
            //d_echo($portfolioItem);
            $this->registry->tpl->assign("portfolioItem", $portfolioItem);

            $modelHTML = $this->registry->tpl->draw('portfolio/portfolioItem', $return_string = true);
        } else {
            // render portfolio Types
            $sql = "SELECT type FROM portfolio GROUP BY type";
            $query = $this->registry->db->query($sql);
            $portfolioTypes = $query->rows;
            //d_echo($portfolioTypes);
            $this->registry->tpl->assign("portfolioTypes", $portfolioTypes);

            // render portfolio Items
            $sql = "SELECT * FROM portfolio";
            $query = $this->registry->db->query($sql);
            $portfolioItems = $query->rows;
            //d_echo($portfolioItems);
            $this->registry->tpl->assign("portfolioItems", $portfolioItems);

            // add footer scripts
            $modelFooter = $this->registry->tpl->draw('portfolio/portfolioFooter', $return_string = true);
            $this->registry->tpl->assign("modelFooter", $modelFooter);

            $modelHTML = $this->registry->tpl->draw($this->tplName, $return_string = true);
        }
        return $modelHTML;
    }

    public function getModelHeaderHTML() {
        return '<link rel="stylesheet" type="text/css" href="' . DIR_WEB_VIEW . 'css/portfolio.css" />
    <link rel="stylesheet" type="text/css" href="' . DIR_WEB_VIEW . 'css/lib/isotope.css" />';
    }

} 