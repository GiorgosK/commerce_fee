<?php

namespace Drupal\commerce_fee\Entity;

use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_store\Entity\EntityStoresInterface;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\commerce_fee\Plugin\Commerce\CommerceFee\CommerceFeeInterface;

/**
 * Defines the interface for fees.
 */
interface FeeInterface extends ContentEntityInterface, EntityStoresInterface {

  /**
   * Gets the fee name.
   *
   * @return string
   *   The fee name.
   */
  public function getName();

  /**
   * Sets the fee name.
   *
   * @param string $name
   *   The fee name.
   *
   * @return $this
   */
  public function setName($name);

  /**
   * Gets the fee description.
   *
   * @return string
   *   The fee description.
   */
  public function getDescription();

  /**
   * Sets the fee description.
   *
   * @param string $description
   *   The fee description.
   *
   * @return $this
   */
  public function setDescription($description);

  /**
   * Gets the fee order types.
   *
   * @return \Drupal\commerce_order\Entity\OrderTypeInterface[]
   *   The fee order types.
   */
  public function getOrderTypes();

  /**
   * Sets the fee order types.
   *
   * @param \Drupal\commerce_order\Entity\OrderTypeInterface[] $order_types
   *   The fee order types.
   *
   * @return $this
   */
  public function setOrderTypes(array $order_types);

  /**
   * Gets the fee order type IDs.
   *
   * @return int[]
   *   The fee order type IDs.
   */
  public function getOrderTypeIds();

  /**
   * Sets the fee order type IDs.
   *
   * @param int[] $order_type_ids
   *   The fee order type IDs.
   *
   * @return $this
   */
  public function setOrderTypeIds(array $order_type_ids);

  /**
   * Gets the plugin.
   *
   * @return \Drupal\commerce_fee\Plugin\Commerce\CommerceFee\CommerceFeeInterface|null
   *   The plugin, or NULL if not yet available.
   */
  public function getPlugin();

  /**
   * Sets the plugin.
   *
   * @param \Drupal\commerce_fee\Plugin\Commerce\CommerceFee\CommerceFeeInterface $plugin
   *   The plugin.
   *
   * @return $this
   */
  public function setPlugin(CommerceFeeInterface $plugin);

  /**
   * Gets the conditions.
   *
   * @return \Drupal\commerce\Plugin\Commerce\Condition\ConditionInterface[]
   *   The conditions.
   */
  public function getConditions();

  /**
   * Sets the conditions.
   *
   * @param \Drupal\commerce\Plugin\Commerce\Condition\ConditionInterface[] $conditions
   *   The conditions.
   *
   * @return $this
   */
  public function setConditions(array $conditions);

  /**
   * Gets the condition operator.
   *
   * @return string
   *   The condition operator. Possible values: AND, OR.
   */
  public function getConditionOperator();

  /**
   * Sets the condition operator.
   *
   * @param string $condition_operator
   *   The condition operator.
   *
   * @return $this
   */
  public function setConditionOperator($condition_operator);

  /**
   * Gets the fee start date.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime
   *   The fee start date.
   */
  public function getStartDate();

  /**
   * Sets the fee start date.
   *
   * @param \Drupal\Core\Datetime\DrupalDateTime $start_date
   *   The fee start date.
   *
   * @return $this
   */
  public function setStartDate(DrupalDateTime $start_date);

  /**
   * Gets the fee end date.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime
   *   The fee end date.
   */
  public function getEndDate();

  /**
   * Sets the fee end date.
   *
   * @param \Drupal\Core\Datetime\DrupalDateTime $end_date
   *   The fee end date.
   *
   * @return $this
   */
  public function setEndDate(DrupalDateTime $end_date = NULL);

  /**
   * Get whether the fee is enabled.
   *
   * @return bool
   *   TRUE if the fee is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets whether the fee is enabled.
   *
   * @param bool $enabled
   *   Whether the fee is enabled.
   *
   * @return $this
   */
  public function setEnabled($enabled);

  /**
   * Checks whether the fee is available for the given order.
   *
   * Ensures that the order type and store match the fee's,
   * that the fee is enabled, and that the current date
   * matches the start and end dates.
   *
   * @param \Drupal\commerce_order\Entity\OrderInterface $order
   *   The order.
   *
   * @return bool
   *   TRUE if fee is available, FALSE otherwise.
   */
  public function available(OrderInterface $order);

  /**
   * Checks whether the fee can be applied to the given order.
   *
   * Ensures that the conditions pass.
   *
   * @param \Drupal\commerce_order\Entity\OrderInterface $order
   *   The order.
   *
   * @return bool
   *   TRUE if fee can be applied, FALSE otherwise.
   */
  public function applies(OrderInterface $order);

  /**
   * Applies the fee to the given order.
   *
   * @param \Drupal\commerce_order\Entity\OrderInterface $order
   *   The order.
   */
  public function apply(OrderInterface $order);

}
