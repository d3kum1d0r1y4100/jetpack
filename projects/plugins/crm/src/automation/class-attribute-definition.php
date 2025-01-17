<?php
/**
 * Attribute Definition
 *
 * @package automattic/jetpack-crm
 * @since $$next-version$$
 */

namespace Automattic\Jetpack\CRM\Automation;

/**
 * Attribute Definition.
 *
 * An attribute represents how a step is configured. For example, a step that
 * sends an email to a contact may have an attribute that represents the email
 * subject, another attribute that represents the email body, and so on.
 *
 * @since $$next-version$$
 */
class Attribute_Definition {

	/**
	 * Represents a dropdown selection input.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	const SELECT = 'select';

	/**
	 * Represents a checkbox input.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	const CHECKBOX = 'checkbox';

	/**
	 * Represents a textarea input.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	const TEXTAREA = 'textarea';

	/**
	 * Represents a text input.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	const TEXT = 'text';

	/**
	 * Represents a date input.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	const DATE = 'date';

	/**
	 * Represents a numerical input.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	const NUMBER = 'number';

	/**
	 * The slug (key) that identifies this attribute.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	protected $slug;

	/**
	 * The title (label) for this attribute.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	protected $title;

	/**
	 * The description for this attribute.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	protected $description;

	/**
	 * Attribute type.
	 *
	 * This is a string that represents the type of the attribute.
	 * E.g.: 'text', 'number', 'select', etc.
	 *
	 * @since $$next-version$$
	 * @var string
	 */
	protected $type;

	/**
	 * Data needed by this attribute (e.g. a map of "key -> description" in the case of a select).
	 *
	 * @since $$next-version$$
	 * @var array|null
	 */
	protected $data;

	/**
	 * Constructor.
	 *
	 * @since $$next-version$$
	 *
	 * @param string     $slug The slug (key) that identifies this attribute.
	 * @param string     $title The title (label) for this attribute.
	 * @param string     $description The description for this attribute.
	 * @param string     $type Attribute type.
	 * @param array|null $data Data needed by this attribute.
	 */
	public function __construct( string $slug, string $title, string $description, string $type, ?array $data = null ) {
		$this->slug        = $slug;
		$this->title       = $title;
		$this->description = $description;
		$this->type        = $type;
		$this->data        = $data;
	}

	/**
	 * Get the slug.
	 *
	 * @since $$next-version$$
	 *
	 * @return string
	 */
	public function get_slug(): string {
		return $this->slug;
	}

	/**
	 * Set the slug.
	 *
	 * @since $$next-version$$
	 *
	 * @param string $slug The slug (key) that identifies this attribute.
	 */
	public function set_slug( string $slug ): void {
		$this->slug = $slug;
	}

	/**
	 * Get the title.
	 *
	 * @since $$next-version$$
	 *
	 * @return string
	 */
	public function get_title(): string {
		return $this->title;
	}

	/**
	 * Set the title.
	 *
	 * @since $$next-version$$
	 *
	 * @param string $title The title (label) for this attribute.
	 */
	public function set_title( string $title ): void {
		$this->title = $title;
	}

	/**
	 * Get the description.
	 *
	 * @since $$next-version$$
	 *
	 * @return string
	 */
	public function get_description(): string {
		return $this->description;
	}

	/**
	 * Set the description.
	 *
	 * @since $$next-version$$
	 *
	 * @param string $description The description for this attribute.
	 */
	public function set_description( string $description ): void {
		$this->description = $description;
	}

	/**
	 * Get the type.
	 *
	 * @since $$next-version$$
	 *
	 * @return string
	 */
	public function get_type(): string {
		return $this->type;
	}

	/**
	 * Set the type.
	 *
	 * @since $$next-version$$
	 *
	 * @param string $type The attribute type.
	 */
	public function set_type( string $type ): void {
		$this->type = $type;
	}

	/**
	 * Get the data.
	 *
	 * @since $$next-version$$
	 *
	 * @return array|null
	 */
	public function get_data(): ?array {
		return $this->data;
	}

	/**
	 * Set the data.
	 *
	 * @since $$next-version$$
	 *
	 * @param array|null $data The data needed by this attribute.
	 */
	public function set_data( ?array $data ): void {
		$this->data = $data;
	}

	/**
	 * Get the attribute definition as an array.
	 *
	 * The main use-case to get the attribute as an array is,
	 * so we can easily share it via API.
	 *
	 * @since $$next-version$$
	 *
	 * @return array
	 */
	public function to_array(): array {
		return array(
			'slug'        => $this->get_slug(),
			'title'       => $this->get_title(),
			'description' => $this->get_description(),
			'type'        => $this->get_type(),
			'data'        => $this->get_data(),
		);
	}
}
