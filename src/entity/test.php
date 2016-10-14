<?php
/** @Entity */
class test
{
/**
 * @Id
 * @Column(type="integer")
 * @GeneratedValue(strategy="AUTO")
 */
protected $id;
    /** @Column(type="integer") */
    private $tada;
}