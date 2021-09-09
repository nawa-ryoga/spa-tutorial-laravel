<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use app\models\Task;
use database\factories\TaskFactory;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $api_route_head = "/api/tasks/";

    /**
     * @test
     */
    public function タスク一覧取得APIへのアクセス() {
        $response = $this->get($this->api_route_head);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function タスク追加APIへのアクセス() {
        $param = $this->createInsertParam();

        $response = $this->postJson($this->api_route_head, $param);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function タスク詳細取得APIへのアクセス() {
        $task = Task::factory()->create($this->createInsertParam());

        $response = $this->get($this->api_route_head . $task->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function タスク編集APIへのアクセス() {
        $task = Task::factory()->create($this->createInsertParam());

        $response = $this->putJson($this->api_route_head . $task->id, ['title' => '編集のテスト']);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function タスク削除APIへのアクセス() {
        $task = Task::factory()->create($this->createInsertParam());

        $response = $this->delete($this->api_route_head . $task->id);
        $response->assertStatus(200);
    }

    protected function createInsertParam()
    {
        $task = Task::factory()->make();
        return $task->toArray();
    }
}
