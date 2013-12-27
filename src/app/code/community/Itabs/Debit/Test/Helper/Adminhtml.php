<?php
/**
 * This file is part of the Itabs_Debit module.
 *
 * PHP version 5
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Itabs
 * @package   Itabs_Debit
 * @author    Rouven Alexander Rieker <rouven.rieker@itabs.de>
 * @copyright 2008-2014 ITABS GmbH (http://www.itabs.de)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   1.0.7
 * @link      http://www.magentocommerce.com/magento-connect/debitpayment.html
 */
/**
 * Helper/Data.php Test Class
 *
 * @group Itabs_Debit
 */
class Itabs_Debit_Test_Helper_Adminhtml extends EcomDev_PHPUnit_Test_Case_Controller
{
    /**
     * @var Itabs_Debit_Helper_Adminhtml
     */
    protected $_helper;

    /**
     * Set up test class
     */
    protected function setUp()
    {
        parent::setUp();
        $this->_helper = Mage::helper('debit/adminhtml');
    }

    /**
     * @test
     */
    public function hasNotExportRequirements()
    {
        $this->assertFalse($this->_helper->hasExportRequirements());
    }

    /**
     * @test
     * @loadFixture ~Itabs_Debit/default
     */
    public function hasExportRequirements()
    {
        $this->assertTrue($this->_helper->hasExportRequirements());
        $this->reset();
    }

    /**
     * @test
     * @loadFixture ~Itabs_Debit/default
     * @loadFixture
     */
    public function getSyncedOrders()
    {
        $this->assertEquals(
            $this->expected('orders')->getResult(),
            $this->_helper->getSyncedOrders()
        );
    }
}
