<?php

class Tag {
    private string $tag_name;
    private string $inner_html;
    private bool $closed;
    private array $attributes;
    private array $children;

    public function __construct(string $tag_name = 'div', string $inner_html = '', bool $closed = TRUE, array $attributes = [], array $children = []) {
        $this->tag_name = $tag_name;
        $this->inner_html = $inner_html;
        $this->closed = $closed;
        $this->attributes = $attributes;
        $this->children = $children;
    }

    public function render(): void {
        $this->render_opening_tag();

        $this->render_inner_html();

        $this->render_children();

        $this->render_closing();
    }

    private function render_opening_tag(): void {
        echo "<{$this->tag_name}";
        if ($this->attributes) {
            foreach ($this->attributes as $key => $value) {
                echo " {$key}=\"{$value}\"";
            }
        }
        echo ">";
    }

    private function render_inner_html(): void {
        if ($this->inner_html) {
            echo $this->inner_html;
        }
    }

    private function render_children(): void {
        if ($this->children) {
            foreach ($this->children as $child) {
                $child->render();
            }
        }
    }

    private function render_closing(): void {
        if ($this->closed) {
            echo "</{$this->tag_name}>";
        }
    }

    public static function top_of_file(): void {
        echo "<!DOCTYPE html>";
    }
}

?>